<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  MetadataTrait.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Jitesoft\Exceptions\Database\Entity\EntityException;
use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Annotations\Field;
use ReflectionClass;
use ReflectionException;

/**
 * MetadataTrait
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
trait MetadataTrait {

    private static $annotationReader = null;

    /**
     * @param string $className
     * @return ReflectionClass
     * @throws EntityException
     */
    private function getReflectionClass(string $className) {
        try {
            return new ReflectionClass($className);
        } catch (ReflectionException $ex) {
            throw new EntityException('Failed to read annotations from the entity.', $className, null, 0, $ex);
        }
    }

    /**
     * Fetch class metadata.
     *
     * @return ModelMetadata
     * @throws EntityException
     */
    protected function getMetadata(): ModelMetadata {
        if (self::$annotationReader === null) {
            try {
                self::$annotationReader = new AnnotationReader();
            } catch (AnnotationException $ex) {
                throw new EntityException(
                    'Failed to initialize the Annotation reader.',
                    get_called_class(),
                    null,
                    0,
                    $ex
                );
            }
        }

        $reflectionClass = $this->getReflectionClass(get_called_class());
        $properties      = $reflectionClass->getProperties();
        $modelAnnotation = self::$annotationReader->getClassAnnotation($reflectionClass, Model::class);

        if ($modelAnnotation === null) {
            throw new EntityException(
                'Failed to create metadata, ModelAnnotation class annotation is required.'
            );
        }

        $fields = [];
        foreach ($properties as $property) {
            $annotation = self::$annotationReader->getPropertyAnnotation($property, Field::class);
            if (!$annotation) {
                continue;
            }

            $inaccessible = $property->isPrivate() || $property->isProtected();

            if ($inaccessible) {
                $property->setAccessible(true);
            }

            $name     = $annotation->name ?? $property->getName();
            $fields[] = new MetadataProperty(
                $name,
                $property->getName(),
                $property->getValue($this),
                $annotation->hidden
            );

            if ($inaccessible) {
                $property->setAccessible(false);
            }
        }

        $table = $modelAnnotation->table;
        return new ModelMetadata($table, $fields);
    }

}
