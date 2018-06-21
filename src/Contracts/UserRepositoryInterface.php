<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepositoryInterface.php - Part of the wordpress-database-abstraction project.

  © - Jitesoft 2018
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\WordPress\DBAL\Contracts;

use Jitesoft\Exceptions\Database\Entity\EntityException;
use Jitesoft\WordPress\DBAL\Models\User;

/**
 * UserRepositoryInterface
 * @author Johannes Tegnér <johannes@jitesoft.com>
 * @version 1.0.0
 */
interface UserRepositoryInterface {

    /**
     * @param int $id
     * @return User
     * @throws EntityException
     */
    public function find(int $id): User;

    /**
     * @return array|User[]
     */
    public function getAll(): array;

}
