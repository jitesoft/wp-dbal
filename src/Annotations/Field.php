<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Field.php

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Field
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @Annotation
 * @Target("PROPERTY")
 */
class Field {
    /** @var string */
    public $name = null;
    /** @var boolean */
    public $hidden = false;
}
