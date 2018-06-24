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

    public function __construct(string $model, string $table, string $join, string $relationType) {
        $this->model        = $model;
        $this->table        = $table;
        $this->join         = $join;
        $this->relationType = $relationType;
    }

}
