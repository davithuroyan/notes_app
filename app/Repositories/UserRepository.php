<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 07-Dec-18
 * Time: 1:57 PM
 */

namespace App\Repositories;


use App\User;

class UserRepository implements RepositoryInterface
{

    public function all(int $userId)
    {

    }

    public function create(array $data)
    {

    }

    public function update(array $data, int $id, int $userId)
    {

    }

    public function delete(int $id, int $userId)
    {

    }

    public function get(int $id, int $userId)
    {

    }

    /**
     * @param string $email
     * @return User
     */
    public function getByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
}