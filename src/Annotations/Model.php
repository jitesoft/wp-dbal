<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Model.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;

/**
 * Model
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @Annotation
 * @Target("CLASS")
 */
class Model {

    /**
     * @var string
     * @Required
     */
    public $table;

    /**
     * @var string
     */
    public $primaryKey;

}
