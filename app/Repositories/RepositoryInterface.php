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
    public function all($userId);

    public function create(array $data);

    public function update(array $data, $id, $userId);

    public function delete($id, $userId);

    public function get($id, $userId);
}
