<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractModel.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Doctrine\Common\Annotations\AnnotationException;
use Jitesoft\Exceptions\Database\Entity\EntityException;
use Jitesoft\Exceptions\Json\JsonException;
use Jitesoft\WordPress\DBAL\Models\Metadata\MetadataTrait;
use JsonSerializable;
use ReflectionException;

/**
 * AbstractModel
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class AbstractModel implements JsonSerializable {
    use MetadataTrait;

    /**
     * @return null|string If null, a failure occurred.
     * @throws AnnotationException
     */
    public function getTableName(): ?string {
        try {
            $table = $this->getMetadata()->getTable();
            if ($table === null) {
                throw new AnnotationException("Invalid model annotation, required parameter `table` missing.");
            }

            return $table;
        } catch (ReflectionException $ex) {
            return null;
        } catch (AnnotationException $ex) {
            throw $ex;
        }
    }

    /**
     * @param bool $includeHidden
     * @return array
     * @throws AnnotationException
     * @throws EntityException
     */
    public function getFields(bool $includeHidden = true): array {
        try {
            $metadata = $this->getMetadata();
        } catch (ReflectionException $ex) {
            throw new EntityException(
                'Failed to fetch model fields. Reflection error.',
                get_called_class(),
                null,
                0,
                $ex
            );
        }

        $fields = [];
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
            return $this->getFields(false);
        } catch (AnnotationException $ex) {
            $class = get_called_class();
            throw new JsonException(sprintf('Failed to convert model `%s` to json.', $class), null, null, null, 0, $ex);
        } catch (EntityException $ex) {
            $class = get_called_class();
            throw new JsonException(sprintf('Failed to convert model `%s` to json.', $class), null, null, null, 0, $ex);
        }
    }

}
