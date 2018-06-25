<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  RelationAnnotationTest.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Tests\Annotations;

use Jitesoft\WordPress\DBAL\Annotations\BelongsTo;
use Jitesoft\WordPress\DBAL\Annotations\HasMany;
use Jitesoft\WordPress\DBAL\Annotations\HasOne;
use Jitesoft\WordPress\DBAL\Annotations\Model;
use Jitesoft\WordPress\DBAL\Models\AbstractModel;
use Jitesoft\WordPress\DBAL\Models\Metadata\RelationMetadata;
use Jitesoft\WordPress\DBAL\Tests\AbstractTestCase;

/**
 * RelationAnnotationTest
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class RelationAnnotationTest extends AbstractTestCase {

    public function testHasOne() {
        $model = new RelationAnnotationTest_ModelOne();
        /** @var array|RelationMetadata[] $relations */
        $relations = $model->getRelations();
        $this->assertCount(1, $relations);
        $this->assertEquals('abc123', $relations[0]->getTable());
        $this->assertEquals('id', $relations[0]->getJoin());
        $this->assertEquals(RelationAnnotationTest_ModelTwo::class, $relations[0]->getModel());
        $this->assertEquals(HasOne::class, $relations[0]->getRelationType());
        $this->assertEquals('lazy', $relations[0]->getLoad());
    }

    public function testHasMany() {
        $model = new RelationAnnotationTest_ModelTwo();
        /** @var array|RelationMetadata[] $relations */
        $relations = $model->getRelations();
        $this->assertCount(1, $relations);
        $this->assertEquals('abc123', $relations[0]->getTable());
        $this->assertEquals('parent_id', $relations[0]->getJoin());
        $this->assertEquals(RelationAnnotationTest_ModelOne::class, $relations[0]->getModel());
        $this->assertEquals(HasMany::class, $relations[0]->getRelationType());
        $this->assertEquals('eager', $relations[0]->getLoad());
    }

    public function testBelongsToMany() {
        $model = new RelationAnnotationTest_ModelThree();
        /** @var array|RelationMetadata[] $relations */
        $relations = $model->getRelations();
        $this->assertCount(1, $relations);
        $this->assertEquals('abc123', $relations[0]->getTable());
        $this->assertEquals('id', $relations[0]->getJoin());
        $this->assertEquals(RelationAnnotationTest_ModelOne::class, $relations[0]->getModel());
        $this->assertEquals(BelongsTo::class, $relations[0]->getRelationType());
        $this->assertEquals('never', $relations[0]->getLoad());
    }

}

/**
 * @Model(table="abc123")
 */
class RelationAnnotationTest_ModelOne extends AbstractModel {

    private $id;
    private $parentId;

    /**
     * @var RelationAnnotationTest_ModelTwo
     * @HasOne(target="Jitesoft\WordPress\DBAL\Tests\Annotations\RelationAnnotationTest_ModelTwo", joinOn="id", load="lazy")
     */
    private $relation;

}

/**
 * @Model(table="abc123")
 */
class RelationAnnotationTest_ModelTwo extends AbstractModel {
    /**
     * @var RelationAnnotationTest_ModelOne
     * @HasMany(target="Jitesoft\WordPress\DBAL\Tests\Annotations\RelationAnnotationTest_ModelOne", joinOn="parent_id", load="eager")
     */
    private $relation;

}

/**
 * @Model(table="abc123")
 */
class RelationAnnotationTest_ModelThree extends AbstractModel {
    /**
     * @var RelationAnnotationTest_ModelOne
     * @BelongsTo(target="Jitesoft\WordPress\DBAL\Tests\Annotations\RelationAnnotationTest_ModelOne", joinOn="id", load="never")
     */
    private $relation;

}
