<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Manager.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL;

use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Manager
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class Manager {
    private static $manager = null;

    private function __construct() {
        include_once __DIR__ . '/../vendor/autoload.php';

        AnnotationRegistry::registerLoader('class_exists');
    }

    public static function create() {
        if (self::$manager === null) {
            self::$manager = new Manager();
        }

        return self::$manager;
    }

}
