<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  ModelAnnotation.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use mindplay\annotations\IAnnotation;

/**
 * ModelAnnotation
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @usage('class'=>true, 'inherited'=>false)
 */
class ModelAnnotation implements IAnnotation {

    /**
     * Table name of a given model.
     * @var string
     */
    public $table;

    /**
     * @param array $properties
     */
    public function initAnnotation(array $properties) {
        $this->table = array_key_exists('table', $properties) ? $properties['table'] : null;
    }

}
