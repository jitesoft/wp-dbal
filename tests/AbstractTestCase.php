<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractTestCase.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Tests;

use Jitesoft\WordPress\DBAL\Manager;
use PHPUnit\Framework\TestCase;

/**
 * AbstractTestCase
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class AbstractTestCase extends TestCase {

    protected function setUp() {
        parent::setUp();

        Manager::create();
    }

}
