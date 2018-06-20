<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  MetadataTrait.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

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
     */
    protected function getMetadata(): ModelMetadata {
        $reflectionClass = new ReflectionClass(get_called_class());
        $properties      = $reflectionClass->getProperties();

        $out = [];
        foreach ($properties as $property) {
            $fields = Annotations::ofProperty($reflectionClass->getName(), $property->getName(), '@field');
            if (count($fields) > 0) {
                $inAccessible = $property->isPrivate() || $property->isProtected();

                if ($inAccessible) {
                    $property->setAccessible(true);
                }

                $name  = $fields[0]->name ?? $property->getName();
                $out[] = new MetadataProperty(
                    $name,
                    $property->getName(),
                    $property->getValue($this),
                    $fields[0]->hidden
                );

                if ($inAccessible) {
                    $property->setAccessible(false);
                }
            }
        }

        $classAnnotations = Annotations::ofClass($this, '@model');
        $table            = null;
        if (count($classAnnotations) > 0) {
            $table = $classAnnotations[0]->table;
        }

        return new ModelMetadata($table, $out);
    }

}
