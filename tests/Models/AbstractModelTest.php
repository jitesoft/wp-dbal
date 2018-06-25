<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractModelTest.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Tests\Models;

use function array_filter;
use Jitesoft\WordPress\DBAL\Annotations\BelongsTo;
use Jitesoft\WordPress\DBAL\Annotations\Field;
use Jitesoft\WordPress\DBAL\Annotations\HasMany;
use Jitesoft\WordPress\DBAL\Annotations\HasOne;
use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use Jitesoft\WordPress\DBAL\Tests\AbstractTestCase;
use function json_encode;

/**
 * AbstractModelTest
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class AbstractModelTest extends AbstractTestCase {

    public function testGetTableName() {
        $model = new AbstractModelTest_Model();
        $this->assertEquals('abc123', $model->getTableName());
    }

    public function testGetRelations() {
        $model     = new AbstractModelTest_Model();
        $relations = $model->getRelations();
        $this->assertCount(3, $relations);

        foreach ($relations as $relation) {
            $this->assertEquals(AbstractModelTest_Relation::class, $relation->getModel());
        }
    }

    public function testGetFields() {
        $model  = new AbstractModelTest_Model();
        $fields = $model->getFields();

        $this->assertCount(2, $fields);
        $this->assertEquals(1, $fields['id']);
        $this->assertEquals(true, $fields['hidden']);
    }

    public function testGetNoneHiddenFields() {
        $model  = new AbstractModelTest_Model();
        $fields = $model->getFields(false);

        $this->assertCount(1, $fields);
        $this->assertEquals(1, $fields['id']);
    }

    public function testToJson() {
        $model = new AbstractModelTest_Model();
        $json  = $model->jsonSerialize();
        $this->assertEquals([
            'type' => 'abc123',
            'fields' => [
                [
                    'field'    => 'id',
                    'value'    => 1,
                    'property' => 'id'
                ]
            ],
            'relations' => [
                [
                    'type' => 'Jitesoft\WordPress\DBAL\Annotations\HasMany',
                    'model' => 'Jitesoft\WordPress\DBAL\Tests\Models\AbstractModelTest_Relation'
                ],
                [
                    'type' => 'Jitesoft\WordPress\DBAL\Annotations\HasOne',
                    'model' => 'Jitesoft\WordPress\DBAL\Tests\Models\AbstractModelTest_Relation'
                ],
                [
                    'type' => 'Jitesoft\WordPress\DBAL\Annotations\BelongsTo',
                    'model' => 'Jitesoft\WordPress\DBAL\Tests\Models\AbstractModelTest_Relation'
                ]
            ]
        ], $json);
    }


}

/**
 * Class AbstractModelTest_Model
 * @Model(table="abc123", primaryKey="id")
 */
class AbstractModelTest_Model extends AbstractModel {

    /**
     * @var int
     * @Field(name="id")
     */
    private $id = 1;

    /**
     * @var bool
     * @Field(name="hidden", hidden=true)
     */
    private $hidden = true;

    /**
     * @var AbstractModelTest_Relation
     * @HasOne(load="lazy", joinOn="id", target="Jitesoft\WordPress\DBAL\Tests\Models\AbstractModelTest_Relation")
     */
    private $child;

    /**
     * @var AbstractModelTest_Relation
     * @BelongsTo(load="lazy", joinOn="id", target="Jitesoft\WordPress\DBAL\Tests\Models\AbstractModelTest_Relation")
     */
    private $parent;

    /**
     * @var AbstractModelTest_Relation
     * @HasMany(load="lazy", joinOn="id", target="Jitesoft\WordPress\DBAL\Tests\Models\AbstractModelTest_Relation")
     */
    private $children;

}

/** @Model(table="abc321") */
class AbstractModelTest_Relation {
}
