<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PostMeta.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

/**
 * PostMeta
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @model('table'=>"wp_postmeta")
 */
class PostMeta {

    /**
     * @var int
     * @field('name'=>"meta_id")
     */
    private $id;

    /**
     * @var int
     * @field('name'=>"post_id")
     */
    private $postId;

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

    public function __construct(int $postId, string $key, string $value) {
        $this->postId = $postId;
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
    public function getPostId(): int {
        return $this->postId;
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
