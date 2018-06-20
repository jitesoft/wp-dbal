<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  ModelAnnotationTest.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Tests\Annotations;

use Jitesoft\WordPress\DBAL\Manager;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use mindplay\annotations\AnnotationException;
use PHPUnit\Framework\TestCase;

/**
 * ModelAnnotationTest
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class ModelAnnotationTest extends TestCase {

    protected function setUp() {
        parent::setUp();

        Manager::create();
    }

    public function testGetTableName() {
        $table = new TestModel_ModelAnnotationTest_1();
        $this->assertEquals('test1', $table->getTableName());
        $table = new TestModel_ModelAnnotationTest_2();
        $this->assertEquals('test2', $table->getTableName());
    }

    public function testGetTableNameFailure() {
        $this->expectException(AnnotationException::class);
        (new TestModel_ModelAnnotationTest_3())->getTableName();
    }

}

/**
 * @model('table'=>"test1")
 */
class TestModel_ModelAnnotationTest_1 extends AbstractModel { }

/**
 * @model('table'=>'test2')
 */
class TestModel_ModelAnnotationTest_2 extends AbstractModel { }

class TestModel_ModelAnnotationTest_3 extends AbstractModel { }
