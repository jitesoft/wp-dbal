<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  MetadataTrait.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Jitesoft\Exceptions\Database\Entity\EntityException;
use Jitesoft\WordPress\DBAL\Annotations\BelongsTo;
use Jitesoft\WordPress\DBAL\Annotations\HasMany;
use Jitesoft\WordPress\DBAL\Annotations\HasOne;
use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Annotations\Field;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

/**
 * MetadataTrait
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @internal
 */
trait MetadataTrait {

    /** @var AnnotationReader */
    private static $annotationReader = null;

    private $metadata;

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
     * @internal
     */
    protected function getMetadata(): ModelMetadata {
        if ($this->metadata !== null) {
            return $this->metadata;
        }

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

        $relations = $this->getRelationships($properties);
        $fields    = $this->getProperties($properties);
        $table     = $modelAnnotation->table;

        $this->metadata = new ModelMetadata($table, $fields, $relations);
        return $this->metadata;
    }

    /**
     * @param array|ReflectionProperty[] $properties
     * @return array|RelationMetadata[]
     * @throws EntityException
     */
    private function getRelationships(array $properties) {
        $relations = [ HasMany::class, HasOne::class, BelongsTo::class ];

        $out = [];
        foreach ($relations as $relation) {
            foreach ($properties as $prop) {
                $annotation = self::$annotationReader->getPropertyAnnotation($prop, $relation);
                if ($annotation === null) {
                    continue;
                }

                try {
                    $reflectionClass = $this->getReflectionClass($annotation->target);
                } catch(EntityException $ex) {
                    throw new EntityException(
                        'Failed to create relationship. Target class was invalid.',
                        null,
                        null,
                        $ex->getCode(),
                        $ex
                    );
                }

                $classAnnotation = self::$annotationReader->getClassAnnotation($reflectionClass, Model::class);
                $table           = $classAnnotation->table;

                $relation = new RelationMetadata(
                    $annotation->target,
                    $table,
                    $annotation->joinOn,
                    get_class($annotation),
                    $annotation->load
                );

                $out[] = $relation;
            }
        }

        return $out;
    }

    /**
     * @param array|ReflectionProperty[] $properties
     * @return array
     */
    private function getProperties(array $properties): array {
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

        return $fields;
    }

}
