<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  ModelAnnotationTest.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Tests\Annotations;

use function class_exists;
use Jitesoft\WordPress\DBAL\Annotations as OOO;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use Jitesoft\WordPress\DBAL\Tests\AbstractTestCase;
use function var_dump;

/**
 * ModelAnnotationTest
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class ModelAnnotationTest extends AbstractTestCase {

    public function testGetTableName() {
        $table = new TestModel_ModelAnnotationTest_1();
        $this->assertEquals('test1', $table->getTableName());
        $table = new TestModel_ModelAnnotationTest_2();
        $this->assertEquals('test2', $table->getTableName());
    }

/*    public function testGetTableNameFailure() {
        $this->expectException(AnnotationException::class);
        (new TestModel_ModelAnnotationTest_3())->getTableName();
    }*/

}

/**
 * @OOO\ModelAnnotation(table="test1")
 */
class TestModel_ModelAnnotationTest_1 extends AbstractModel { }

/**
 * @OOO\ModelAnnotation(table="test2")
 */
class TestModel_ModelAnnotationTest_2 extends AbstractModel { }

class TestModel_ModelAnnotationTest_3 extends AbstractModel { }
