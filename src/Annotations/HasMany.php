<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  HasMany.php

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\Common\Annotations\Annotation\Required;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;

/**
 * HasMany
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @Annotation
 * @Target("PROPERTY")
 */
class HasMany {

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
