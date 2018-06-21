<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  ModelFieldAnnotation.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * ModelFieldAnnotation
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @Annotation
 * @Target("PROPERTY")
 */
class ModelFieldAnnotation {
    /** @var string */
    public $name = null;
    /** @var boolean */
    public $hidden = false;
}
