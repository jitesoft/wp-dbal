<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractModel.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Jitesoft\WordPress\DBAL\Models\Metadata\MetadataTrait;
use mindplay\annotations\AnnotationException;
use ReflectionException;

/**
 * AbstractModel
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
class AbstractModel {
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
     * @return array|null If null, a failure occurred.
     */
    public function getFields(bool $includeHidden = true): ?array {
        try {
            $metadata = $this->getMetadata();
        } catch (ReflectionException $ex) {
            return null;
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

}
