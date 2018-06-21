<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Link.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Carbon\Carbon;

/**
 * Link
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @model('table'=>"wp_links")
 */
class Link {

    /**
     * @var int
     * @field('name'=>"link_id")
     */
    private $id;

    /**
     * @var string
     * @field('name'=>"link_url")
     */
    private $url;

    /**
     * @var string
     * @field('name'=>"link_name")
     */
    private $name;

    /**
     * @var string
     * @field('name'=>"link_image")
     */
    private $image;

    /**
     * @var string
     * @field('name'=>"link_target")
     */
    private $target;

    /**
     * @var string
     * @field('name'=>"link_description")
     */
    private $description;

    /**
     * @var bool
     * @field('name'=>"link_visible")
     */
    private $visible;

    /**
     * @todo: Should this be a int or a User object at the end?
     *
     * @var int
     * @field('name'=>"link_owner")
     */
    private $owner;

    /**
     * @var int
     * @field('name'=>"link_rating")
     */
    private $rating;

    /**
     * @var Carbon
     * @field('name'=>"link_updated")
     */
    private $updated;

    /**
     * @var string
     * @field('name'=>"link_rel")
     */
    private $rel;

    /**
     * @var string
     * @field('name'=>"link_notes")
     */
    private $notes;

    /**
     * @var string
     * @field('name'=>"link_rss")
     */
    private $rss;

    /**
     * Link constructor.
     * @param int $owner Owner id.
     */
    public function __construct(int $owner) {
        // todo: Is owner a user? in that case, User should be passed here.
        $this->owner = $owner;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
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
    public function getImage(): string {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getTarget(): string {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool {
        return $this->visible;
    }

    /**
     * @return int
     */
    public function getOwner(): int {
        return $this->owner;
    }

    /**
     * @return int
     */
    public function getRating(): int {
        return $this->rating;
    }

    /**
     * @return Carbon
     */
    public function getUpdated(): Carbon {
        return $this->updated;
    }

    /**
     * @return string
     */
    public function getRel(): string {
        return $this->rel;
    }

    /**
     * @return string
     */
    public function getNotes(): string {
        return $this->notes;
    }

    /**
     * @return string
     */
    public function getRss(): string {
        return $this->rss;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) {
        $this->url = $url;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image) {
        $this->image = $image;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target) {
        $this->target = $target;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * @param bool $visible
     */
    public function setVisible(bool $visible) {
        $this->visible = $visible;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating) {
        $this->rating = $rating;
    }

    /**
     * @param Carbon $updated
     */
    public function setUpdated(Carbon $updated) {
        $this->updated = $updated;
    }

    /**
     * @param string $rel
     */
    public function setRel(string $rel) {
        $this->rel = $rel;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes) {
        $this->notes = $notes;
    }

    /**
     * @param string $rss
     */
    public function setRss(string $rss) {
        $this->rss = $rss;
    }

}
