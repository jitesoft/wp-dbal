<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  CommentMeta.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Jitesoft\WordPress\DBAL\Annotations\Field;
use Jitesoft\WordPress\DBAL\Annotations\Model;

/**
 * CommentMeta
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @Model(table="wp_commentmeta", primaryKey="meta_id")
 */
class CommentMeta extends AbstractModel {

    /**
     * @var int|null
     * @Field(name="meta_id")
     */
    private $id;

    /**
     * @var int
     * @Field(name="comment_id")
     */
    private $commentId;

    /**
     * @var string
     * @Field(name="meta_key")
     */
    private $key;

    /**
     * @var string
     * @Field(name="meta_value")
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
