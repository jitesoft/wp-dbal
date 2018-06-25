<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractModel.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Jitesoft\Exceptions\Database\Entity\EntityException;
use Jitesoft\Exceptions\Json\JsonException;
use Jitesoft\WordPress\DBAL\Models\Metadata\MetadataProperty;
use Jitesoft\WordPress\DBAL\Models\Metadata\MetadataTrait;
use Jitesoft\WordPress\DBAL\Models\Metadata\RelationMetadata;
use JsonSerializable;

/**
 * AbstractModel
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class AbstractModel implements JsonSerializable {
    use MetadataTrait;

    /**
     * @return null|string If null, a failure occurred.
     * @throws EntityException
     */
    public function getTableName(): ?string {
        return $this->getMetadata()->getTable();
    }

    /**
     * @return array|RelationMetadata[]
     * @throws EntityException
     */
    public function getRelations(): array {
        return $this->getMetadata()->getRelations();
    }

    /**
     * @param bool $includeHidden
     * @return array
     * @throws EntityException
     */
    public function getFields(bool $includeHidden = true): array {
        $metadata = $this->getMetadata();
        $fields   = [];
        foreach ($metadata->getFields() as $property) {
            if (!$includeHidden && $property->isHidden()) {
                continue;
            }

            $fields[$property->getName()] = $property->getValue();
        }

        return $fields;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource.
     *
     * @since 5.4.0
     * @throws JsonException
     */
    public function jsonSerialize() {
        try {
            $meta   = $this->getMetadata();
            $fields = array_filter($meta->getFields(), function(MetadataProperty $p) {
                return !$p->isHidden();
            });
            return [
                'type' => $this->getTableName(),
                'fields' => array_map(function(MetadataProperty $property) {
                    return [
                        'field'    => $property->getName(),
                        'property' => $property->getRealName(),
                        'value'    => $property->getValue()
                    ];
                }, $fields),
                'relations' => array_map(function(RelationMetadata $relation) {
                    return [
                        'type' => $relation->getRelationType(),
                        'model' => $relation->getModel()
                    ];
                }, $meta->getRelations())
            ];
        } catch (EntityException $ex) {
            $class = get_called_class();
            throw new JsonException(sprintf('Failed to convert model `%s` to json.', $class), null, null, null, 0, $ex);
        }
    }

}
