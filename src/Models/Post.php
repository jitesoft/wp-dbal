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
    private $author;

    /**
     * @var Carbon
     * @field(name="post_date")
     */
    private $postedAt;

    /**
     * @var Carbon
     * @field(name="post_date_gmt")
     */
    private $postedAtGMT;

    /**
     * @var Carbon
     * @field(name="post_modified")
     */
    private $modifiedAt;

    /**
     * @var Carbon
     * @field(name="post_modified")
     */
    private $modifiedAtGMT;

    /**
     * @var string
     * @field(name="post_content")
     */
    private $content;

    /**
     * @var string
     * @field(name="post_title")
     */
    private $title;

    /**
     * @var string
     * @field(name="post_excerpt")
     */
    private $excerpt;

    /**
     * @var string
     * @field('name'=>"post_status")
     */
    private $status;

    /**
     * @var string
     * @field('name'=>"comment_status")
     */
    private $commentStatus;

    /**
     * @var string
     * @field('name'=>"ping_status")
     */
    private $pingStatus;

    /**
     * @var string
     * @field('name'=>"post_password")
     */
    private $postPassword;

    /**
     * @var string
     * @field('name'=>"post_name")
     */
    private $postName;

    /**
     * @var string
     * @field('name'=>"to_ping")
     */
    private $toPing;

    /**
     * @var string
     * @field('name'=>"pinged")
     */
    private $pinged;

    /**
     * @var string
     * @field('name'=>"post_content_filtered")
     */
    private $postContentFiltered;

    /**
     * @var int
     * @field('name'=>"post_parent")
     */
    private $parent;

    /**
     * @var string
     * @field('name'=>"guid")
     */
    private $guid;

    /**
     * @var int
     * @field('name'=>"menu_order")
     */
    private $menuOrder;

    /**
     * @var string
     * @field('name'=>"post_type")
     */
    private $type;

    /**
     * @var string
     * @field('name'=>"post_mime_type")
     */
    private $postMimeType;

    /**
     * @var int
     * @field('name'=>"comment_count")
     */
    private $commentCount;

    /**
     * Post constructor.
     * @param User   $author
     * @param string $title
     * @param string $content
     */
    public function __construct(User $author, string $title, string $content) {
        $this->author  = $author->getId();
        $this->title   = $title;
        $this->content = $content;

        $this->postedAt      = Carbon::now('UTC');
        $this->postedAtGMT   = Carbon::now('GMT');
        $this->modifiedAt    = Carbon::now('UTC');
        $this->modifiedAtGMT = Carbon::now('GMT');
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
    public function getAuthor(): int {
        return $this->author;
    }

    /**
     * @return Carbon
     */
    public function getPostedAt(): Carbon {
        return $this->postedAt;
    }

    /**
     * @return Carbon
     */
    public function getModifiedAt(): Carbon {
        return $this->modifiedAt;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getExcerpt(): string {
        return $this->excerpt;
    }

    /**
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getCommentStatus(): string {
        return $this->commentStatus;
    }

    /**
     * @return string
     */
    public function getPingStatus(): string {
        return $this->pingStatus;
    }

    /**
     * @return string
     */
    public function getPostPassword(): string {
        return $this->postPassword;
    }

    /**
     * @return string
     */
    public function getPostName(): string {
        return $this->postName;
    }

    /**
     * @return string
     */
    public function getToPing(): string {
        return $this->toPing;
    }

    /**
     * @return string
     */
    public function getPinged(): string {
        return $this->pinged;
    }

    /**
     * @return string
     */
    public function getPostContentFiltered(): string {
        return $this->postContentFiltered;
    }

    /**
     * @return int
     */
    public function getParent(): int {
        return $this->parent;
    }

    /**
     * @return string
     */
    public function getGuid(): string {
        return $this->guid;
    }

    /**
     * @return int
     */
    public function getMenuOrder(): int {
        return $this->menuOrder;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPostMimeType(): string {
        return $this->postMimeType;
    }

    /**
     * @return int
     */
    public function getCommentCount(): int {
        return $this->commentCount;
    }

    /**
     * @param int $author
     */
    public function setAuthor(int $author) {
        $this->author = $author;
    }

    /**
     * @param Carbon $modifiedAt
     */
    public function setModifiedAt(Carbon $modifiedAt) {
        $this->modifiedAt    = $modifiedAt;
        $this->modifiedAtGMT = $modifiedAt->setTimezone('GMT');
    }

    /**
     * @param string $content
     */
    public function setContent(string $content) {
        $this->content = $content;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) {
        $this->title = $title;
    }

    /**
     * @param string $excerpt
     */
    public function setExcerpt(string $excerpt) {
        $this->excerpt = $excerpt;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status) {
        $this->status = $status;
    }

    /**
     * @param string $commentStatus
     */
    public function setCommentStatus(string $commentStatus) {
        $this->commentStatus = $commentStatus;
    }

    /**
     * @param string $pingStatus
     */
    public function setPingStatus(string $pingStatus) {
        $this->pingStatus = $pingStatus;
    }

    /**
     * @param string $postPassword
     */
    public function setPostPassword(string $postPassword) {
        $this->postPassword = $postPassword;
    }

    /**
     * @param string $postName
     */
    public function setPostName(string $postName) {
        $this->postName = $postName;
    }

    /**
     * @param string $toPing
     */
    public function setToPing(string $toPing) {
        $this->toPing = $toPing;
    }

    /**
     * @param string $pinged
     */
    public function setPinged(string $pinged) {
        $this->pinged = $pinged;
    }

    /**
     * @param string $postContentFiltered
     */
    public function setPostContentFiltered(string $postContentFiltered) {
        $this->postContentFiltered = $postContentFiltered;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent) {
        $this->parent = $parent;
    }

    /**
     * @param string $guid
     */
    public function setGuid(string $guid) {
        $this->guid = $guid;
    }

    /**
     * @param int $menuOrder
     */
    public function setMenuOrder(int $menuOrder) {
        $this->menuOrder = $menuOrder;
    }

    /**
     * @param string $type
     */
    public function setType(string $type) {
        $this->type = $type;
    }

    /**
     * @param string $postMimeType
     */
    public function setPostMimeType(string $postMimeType) {
        $this->postMimeType = $postMimeType;
    }

    /**
     * @param int $commentCount
     */
    public function setCommentCount(int $commentCount) {
        $this->commentCount = $commentCount;
    }

}
