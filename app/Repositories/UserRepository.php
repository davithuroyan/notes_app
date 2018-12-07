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
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all(int $userId)
    {

    }

    public function create(array $data)
    {

    }

    public function update(array $data, int $id, int $userId = null): bool
    {
        return $this->model->where('id', $id)->update($data);
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
        return $this->model->where('email', $email)->first();
    }
}