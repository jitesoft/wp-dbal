<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserMeta.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

/**
 * UserMeta
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @model('table'=>"wp_usermeta")
 */
class UserMeta extends AbstractModel {

    /**
     * @var int
     * @field('name'=>"umeta_id")
     */
    private $id;

    /**
     * @var int
     * @field('name'=>"user_id")
     */
    private $userId;

    /**
     * @var string
     * @field('name'=>"meta_key")
     */
    private $key;

    /**
     * @var string
     * @field('name'=>"meta_value")
     */
    private $value;

    public function __construct(int $userId, string $key, string $value) {
        $this->userId = $userId;
        $this->key    = $key;
        $this->value  = $value;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key) {
        $this->key = $key;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value) {
        $this->value = $value;
    }

}
