<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  MetadataProperty.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models\Metadata;

/**
 * MetadataProperty
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 * @internal
 */
class MetadataProperty {

    private $name;
    private $realName;
    private $value;
    private $hidden;

    /**
     * MetadataProperty constructor.
     * @param string $name
     * @param string $realName
     * @param        $value
     * @param bool   $hidden
     */
    public function __construct(string $name, string $realName, $value, bool $hidden = false) {
        $this->name     = $name;
        $this->realName = $realName;
        $this->value    = $value;
        $this->hidden   = $hidden;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRealName(): string {
        return $this->realName;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool {
        return $this->hidden;
    }

}
