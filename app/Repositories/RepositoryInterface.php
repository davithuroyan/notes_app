<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 04-Dec-18
 * Time: 1:00 PM
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function all(int $userId);

    public function create(array $data);

    public function update(array $data, int $id, int $userId);

    public function delete(int $id, int $userId);

    public function get(int $id, int $userId);
}
