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

    /**
     * Comment constructor.
     * @param Post         $post        Post the comment refers to.
     * @param string       $content     Comment content.
     * @param string       $type        Type of comment.
     * @param Comment|null $parent      Parent comment, if applicable.
     * @param User|null    $user        User object if it is a registered User whom made the comment.
     * @param null|string  $author      Author, should be set if user is set, if user is set, this will not be used.
     * @param null|string  $authorUrl   Optional author url - will use User.url if User is set.
     * @param null|string  $authorEmail Optional author email - will use User.email if User is set.
     */
    public function __construct(Post $post,
                                string $content,
                                string $type,
                                ?Comment $parent = null,
                                ?User $user = null,
                                ?string $author = null,
                                ?string $authorUrl = null,
                                ?string $authorEmail = null) {

        $this->postId  = $post->getId();
        $this->content = $content;
        $this->type    = $type;
        $this->parent  = $parent === null ? null : $parent->getId();

        if ($user) {
            $this->userId      = $user->getId();
            $this->author      = $user->getDisplayName();
            $this->authorEmail = $user->getEmail();
            $this->authorUrl   = $user->getUrl();
            $this->authorIp    = 'n/a'; // TODO: should it even exist?
        } else if ($author) {
            $this->author      = $author;
            $this->authorEmail = $authorEmail;
            $this->authorUrl   = $authorUrl;
        }

        $this->commentDate    = Carbon::now('UTC');
        $this->commentDateGMT = Carbon::now('GMT');

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
     * @return int
     */
    public function getPostId(): int {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function getAuthor(): string {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getAuthorEmail(): string {
        return $this->authorEmail;
    }

    /**
     * @return string
     */
    public function getAuthorUrl(): string {
        return $this->authorUrl;
    }

    /**
     * @return string
     */
    public function getAuthorIp(): string {
        return $this->authorIp;
    }

    /**
     * @return Carbon
     */
    public function getCommentDate(): Carbon {
        return $this->commentDate;
    }

    /**
     * @return Carbon
     */
    public function getCommentDateGmt(): Carbon {
        return $this->commentDateGMT;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getKarma(): int {
        return $this->karma;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool {
        return $this->approved;
    }

    /**
     * @return string
     */
    public function getAgent(): string {
        return $this->agent;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getParent(): int {
        return $this->parent;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author) {
        $this->author = $author;
    }

    /**
     * @param string $authorEmail
     */
    public function setAuthorEmail(string $authorEmail) {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @param string $authorUrl
     */
    public function setAuthorUrl(string $authorUrl) {
        $this->authorUrl = $authorUrl;
    }

    /**
     * @param string $authorIp
     */
    public function setAuthorIp(string $authorIp) {
        $this->authorIp = $authorIp;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content) {
        $this->content = $content;
    }

    /**
     * @param int $karma
     */
    public function setKarma(int $karma) {
        $this->karma = $karma;
    }

    /**
     * @param bool $approved
     */
    public function setApproved(bool $approved) {
        $this->approved = $approved;
    }

    /**
     * @param string $agent
     */
    public function setAgent(string $agent) {
        $this->agent = $agent;
    }

}
