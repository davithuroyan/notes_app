<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 04-Dec-18
 * Time: 12:33 PM
 */

namespace App\Repositories;


use App\Note;

class NotesRepository implements RepositoryInterface
{
    protected $model;
    
    public function __construct(Note $note)
    {
        $this->model = $note;
    }

    public function all($userId)
    {
        return $this->model->where(['user_id' => $userId])->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $userId)
    {
        $note = $this->get($id, $userId);

        $note->title = $data['title'];
        $note->note = $data['note'];
        return $note->save();
    }

    public function delete($id, $userId)
    {
        if ($this->model->where(['id' => $id, 'user_id' => $userId])->delete()) {
            return "success";
        }
        return "false";
    }

    public function get($id, $userId)
    {
        return $this->model->where(['id' => $id, 'user_id' => $userId])->first();
    }
}