<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Post.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Carbon\Carbon;

/**
 * Post
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @Entity(table="wp_posts")
 */
class Post extends AbstractModel {

    /**
     * @var int
     * @field(name="ID")
     */
    private $id;

    /**
     * @var int
     * @field(name="post_author")
     */
    private $postAutor;

    /**
     * @var Carbon
     * @field(name="post_date")
     */
    private $postDate;

    /**
     * @var Carbon
     * @field(name="post_modified")
     */
    private $postModified;

    /**
     * @var string
     * @field(name="post_content")
     */
    private $postContent;

    /**
     * @var string
     * @field(name="post_title")
     */
    private $postTitle;

    /**
     * @var string
     * @field(name="post_excerpt")
     */
    private $postExcerpt;

    private $postStatus;
    private $commentStatus;
    private $pingStatus;
    private $postPassword;
    private $postName;
    private $toPing;
    private $pinged;


    private $postContentFiltered;

    private $postParent;
    private $guid;
    private $menuOrder;

    private $postType;
    private $postMimeType;
    private $commentCount;


}

// Entity $table
// Field $name, $type
// HaveMany $model
// HaveOne $model
