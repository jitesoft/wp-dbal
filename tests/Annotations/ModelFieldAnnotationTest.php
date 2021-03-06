<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  ModelAnnotationTest.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Tests\Annotations;

use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use Jitesoft\WordPress\DBAL\Annotations\Field;
use Jitesoft\WordPress\DBAL\Tests\AbstractTestCase;

/**
 * ModelAnnotationTest
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class ModelFieldAnnotationTest extends AbstractTestCase {

    public function testGetAllFields() {
        $model  = new TestModel_ModelFieldAnnotationTest();
        $fields = $model->getFields();
        $this->assertCount(5, $fields);
        $this->assertEquals([
            'noName',
            'property_one',
            'property_two',
            'hidden_one',
            'hidden_two'
        ], array_keys($fields));
    }

    public function testGetNoneHidden() {
        $model  = new TestModel_ModelFieldAnnotationTest();
        $fields = $model->getFields(false);
        $this->assertCount(3, $fields);
        $this->assertEquals([
            'noName',
            'property_one',
            'property_two'
        ], array_keys($fields));
    }

    public function testGetValues() {
        $model  = new TestModel_ModelFieldAnnotationTest();
        $fields = $model->getFields();
        $this->assertCount(5, $fields);
        $this->assertEquals([
            'noName',
            'property_one',
            'property_two',
            'hidden_one',
            'hidden_two'
        ], array_keys($fields));

        $this->assertEquals(null, $fields['noName']);
        $this->assertEquals('one', $fields['property_one']);
        $this->assertEquals(5, $fields['property_two']);
        $this->assertEquals('hiddenOne', $fields['hidden_one']);
        $this->assertEquals(10, $fields['hidden_two']);
    }

}

/**
 * @Model(table="abc")
 */
class TestModel_ModelFieldAnnotationTest extends AbstractModel {

    private $shouldNotBeRead = 100;

    /**
     * @var string
     * @Field
     */
    private $noName;

    /**
     * @var string
     * @Field(name="property_one", hidden=false)
     */
    private $propertyOne = "one";

    /**
     * @var int
     * @Field(name="property_two")
     */
    private $propertyTwo = 5;

    /**
     * @var string
     * @field(name="hidden_one", hidden=true)
     */
    private $hiddenPropertyOne = "hiddenOne";

    /**
     * @var int
     * @field(name="hidden_two", hidden=true)
     */
    private $hiddenPropertyTwo = 10;

}
