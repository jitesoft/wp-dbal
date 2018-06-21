<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Option.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

/**
 * Option
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @model('table'=>"wp_options")
 */
class Option {

    /**
     * @var int
     * @field('name'=>"option_id")
     */
    private $id;

    /**
     * @var string
     * @field('name'=>"option_name")
     */
    private $name;

    /**
     * @var string
     * @field('name'=>"option_value")
     */
    private $value;

    /**
     * @var string
     * @field('name'=>"autoload")
     */
    private $autoload;

    public function __construct(string $name, string $value, string $autoload) {
        $this->name     = $name;
        $this->value    = $value;
        $this->autoload = $autoload;
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
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getAutoload(): string {
        return $this->autoload;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value) {
        $this->value = $value;
    }

    /**
     * @param string $autoload
     */
    public function setAutoload(string $autoload) {
        $this->autoload = $autoload;
    }

}
