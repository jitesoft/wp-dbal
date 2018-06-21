<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  CommentMeta.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

/**
 * CommentMeta
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @model('table'=>'wp_commentmeta')
 */
class CommentMeta extends AbstractModel {

    /**
     * @var int|null
     * @field('name'=>"meta_id")
     */
    private $id;

    /**
     * @var int
     * @field('name'=>"comment_id")
     */
    private $commentId;

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

    public function __construct(int $commentId, ?string $key = null, ?string $value = null) {
        $this->commentId = $commentId;
        $this->key       = $key;
        $this->value     = $value;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
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
     * @return int
     */
    public function getCommentId(): int {
        return $this->commentId;
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
