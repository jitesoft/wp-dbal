<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  MetadataTrait.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

use Jitesoft\WordPress\DBAL\Annotations\ModelAnnotation;
use Jitesoft\WordPress\DBAL\Annotations\ModelFieldAnnotation;
use mindplay\annotations\AnnotationException;
use mindplay\annotations\Annotations;
use ReflectionClass;

/**
 * MetadataTrait
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
trait MetadataTrait {

    /**
     * Fetch class metadata.
     *
     * @return ModelMetadata
     * @throws \ReflectionException
     * @throws AnnotationException
     */
    protected function getMetadata(): ModelMetadata {
        $reflectionClass = new ReflectionClass(get_called_class());
        $properties      = $reflectionClass->getProperties();

        $out = [];
        foreach ($properties as $property) {
            /** @var ModelFieldAnnotation[] $fields */
            $fields = Annotations::ofProperty($reflectionClass->getName(), $property->getName(), '@field');
            if (count($fields) > 0) {
                $inAccessible = $property->isPrivate() || $property->isProtected();

                if ($inAccessible) {
                    $property->setAccessible(true);
                }

                $name  = $fields[0]->getName() ?? $property->getName();
                $out[] = new MetadataProperty(
                    $name,
                    $property->getName(),
                    $property->getValue($this),
                    $fields[0]->isHidden()
                );

                if ($inAccessible) {
                    $property->setAccessible(false);
                }
            }
        }

        /** @var ModelAnnotation[] $classAnnotations */
        $classAnnotations = Annotations::ofClass($this, '@model');
        if (count($classAnnotations) <= 0) {
            throw new AnnotationException(
                'Failed to create metadata, the `model` class annotation is required.'
            );
        }
        $table = $classAnnotations[0]->getTable();

        return new ModelMetadata($table, $out);
    }

}
