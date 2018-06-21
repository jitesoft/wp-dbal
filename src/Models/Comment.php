<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Comment.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Carbon\Carbon;

/**
 * Comment
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @model('table'=>"wp_comments")
 */
class Comment {

    /**
     * @var int
     * @field('name'=>"comment_ID")
     */
    private $id;

    /**
     * @var int
     * @field('name'=>"user_id")
     */
    private $userId;

    /**
     * @var int
     * @field('name'=>"comment_post_ID")
     */
    private $postId;

    /**
     * @var string
     * @field('name'=>"comment_author")
     */
    private $author;

    /**
     * @var string
     * @field('name'=>"comment_author_email")
     */
    private $authorEmail;

    /**
     * @var string
     * @field('name'=>"comment_author_url")
     */
    private $authorUrl;

    /**
     * @var string
     * @field('name'=>"comment_author_IP", 'hidden'=>true)
     */
    private $authorIp;

    /**
     * @var Carbon
     * @field('name'=>"comment_date")
     */
    private $commentDate;

    /**
     * @var Carbon
     * @field('name'=>"comment_date_gmt")
     */
    private $commentDateGMT;

    /**
     * @var string
     * @field('name'=>"comment_content")
     */
    private $content;

    /**
     * @var int
     * @field('name'=>"comment_karma")
     */
    private $karma;

    /**
     * @var bool
     * @field('name'=>"comment_approved")
     */
    private $approved;

    /**
     * @var string
     * @field('name'=>"comment_agent")
     */
    private $agent;

    /**
     * @var string
     * @field('name'=>"comment_type")
     */
    private $type;

    /**
     * @var int
     * @field('name'=>"comment_parent")
     */
    private $parent;

}
