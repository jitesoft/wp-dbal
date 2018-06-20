<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Manager.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL;
use Jitesoft\WordPress\DBAL\Annotations\ModelAnnotation;
use Jitesoft\WordPress\DBAL\Annotations\ModelFieldAnnotation;
use mindplay\annotations\AnnotationCache;
use mindplay\annotations\Annotations;

/**
 * Manager
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class Manager {
    private static $manager;

    private function __construct() {
        require_once __DIR__ . '/../vendor/autoload.php';

        Annotations::$config['cache'] = new AnnotationCache(__DIR__ . '/../cache');

        Annotations::getManager()->registry[ModelAnnotation::ANNOTATION_IDENTIFIER]      = ModelAnnotation::class;
        Annotations::getManager()->registry[ModelFieldAnnotation::ANNOTATION_IDENTIFIER] = ModelFieldAnnotation::class;
    }

    public static function create() {
        if (!self::$manager) {
            self::$manager = new Manager();
        }

        return self::$manager;
    }

}
