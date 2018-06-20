<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  ModelFieldAnnotation.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use mindplay\annotations\IAnnotation;

/**
 * ModelFieldAnnotation
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @usage('property'=>true, 'inherited'=>true, 'multiple'=>false)
 */
class ModelFieldAnnotation implements IAnnotation {
    public const ANNOTATION_IDENTIFIER = "field";

    public $name;
    public $hidden;

    /**
     * @return string|null
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool {
        return $this->hidden;
    }

    /**
     * @param array $properties
     */
    public function initAnnotation(array $properties) {
        $this->name   = array_key_exists('name', $properties) ? $properties['name'] : null;
        $this->hidden = boolval((array_key_exists('hidden', $properties) ? $properties['hidden'] : false));
    }

}
