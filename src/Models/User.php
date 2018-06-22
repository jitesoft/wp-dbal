<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  User.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Models;

use Carbon\Carbon;
use Jitesoft\WordPress\DBAL\Annotations\Field;
use Jitesoft\WordPress\DBAL\Annotations\Model;

/**
 * User
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 *
 * @Model(table="wp_users", primaryKey="ID")
 */
class User extends AbstractModel {

    /**
     * @var int
     * @Field(name="ID")
     */
    private $id;

    /**
     * @var string
     * @Field(name="user_login")
     */
    private $login;

    /**
     * @var string
     * @Field(name="user_pass")
     */
    private $password;

    /**
     * @var string
     * @Field(name="user_nicename")
     */
    private $niceName;

    /**
     * @var string
     * @Field(name="user_email")
     */
    private $email;

    /**
     * @var string
     * @Field(name="user_url")
     */
    private $url;

    /**
     * @var Carbon
     * @Field(name="user_registered")
     */
    private $registered;

    /**
     * @var string
     * @Field(name="user_activation_key")
     */
    private $activationKey;

    /**
     * @var int
     * @Field(name="user_status")
     */
    private $status;

    /**
     * @var string
     * @Field(name="display_name")
     */
    private $displayName;

    public function __construct(string $login, string $password, string $email) {
        $this->login    = $login;
        $this->password = $password;
        $this->email    = $email;
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
    public function getLogin(): string {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getNiceName(): string {
        return $this->niceName;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @return Carbon
     */
    public function getRegistered(): Carbon {
        return $this->registered;
    }

    /**
     * @return string
     */
    public function getActivationKey(): string {
        return $this->activationKey;
    }

    /**
     * @return int
     */
    public function getStatus(): int {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string {
        return $this->displayName;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login) {
        $this->login = $login;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * @param string $niceName
     */
    public function setNiceName(string $niceName) {
        $this->niceName = $niceName;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email) {
        $this->email = $email;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) {
        $this->url = $url;
    }

    /**
     * @param Carbon $registered
     */
    public function setRegistered(Carbon $registered) {
        $this->registered = $registered;
    }

    /**
     * @param string $activationKey
     */
    public function setActivationKey(string $activationKey) {
        $this->activationKey = $activationKey;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status) {
        $this->status = $status;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName(string $displayName) {
        $this->displayName = $displayName;
    }

}
