<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  HasOne.php

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * HasOne
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @Annotation
 * @Target("PROPERTY")
 */
class HasOne {

    /**
     * @var string
     * @Required
     */
    public $target;

    /**
     * @var string
     * @Required
     */
    public $joinOn;

    /**
     * @var string
     * @Enum({"eager", "lazy", "never"})
     */
    public $load = "lazy";

}
