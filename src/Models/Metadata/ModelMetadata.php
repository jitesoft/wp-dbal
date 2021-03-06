<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Metadata.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

/**
 * Metadata
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @internal
 */
class ModelMetadata {

    private $fields;
    private $table;
    private $relations;

    /**
     * ModelMetadata constructor.
     * @internal
     * @param string|null $table
     * @param array       $fields
     * @param array       $relations
     */
    public function __construct(?string $table, array $fields, array $relations = []) {
        $this->table     = $table;
        $this->fields    = $fields;
        $this->relations = $relations;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->fields)) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * Get the table name from the model metadata.
     *
     * @return string|null table name
     */
    public function getTable(): ?string {
        return $this->table;
    }

    /**
     * @return array|MetadataProperty[]
     */
    public function getFields(): array {
        return $this->fields;
    }

    /**
     * @return array
     */
    public function getRelations() : array {
        return $this->relations;
    }

}
