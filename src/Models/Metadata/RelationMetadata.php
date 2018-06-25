<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  RelationMetadata.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

/**
 * RelationMetadata
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @internal
 */
class RelationMetadata {

    /** @var string */
    private $model;
    /** @var string  */
    private $table;
    /** @var string  */
    private $join;
    /** @var string  */
    private $relationType;
    /** @var string */
    private $load;

    public function __construct(string $model, string $table, string $join, string $relationType, string $load) {
        $this->model        = $model;
        $this->table        = $table;
        $this->join         = $join;
        $this->relationType = $relationType;
        $this->load         = $load;
    }

    /**
     * @return string
     */
    public function getModel(): string {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getTable(): string {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getJoin(): string {
        return $this->join;
    }

    /**
     * @return string
     */
    public function getRelationType(): string {
        return $this->relationType;
    }

    /**
     * @return string
     */
    public function getLoad(): string {
        return $this->load;
    }

}
