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

    /**
     * NotesRepository constructor.
     * @param Note $note
     */
    public function __construct(Note $note)
    {
        $this->model = $note;
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function all(int $userId)
    {
        return $this->model->where(['user_id' => $userId])->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @param int $userId
     * @return mixed
     */
    public function update(array $data, int $id, int $userId)
    {
        $note = $this->get($id, $userId);
        if (!$note) {
            return false;
        }

        $note->title = $data['title'];
        $note->note = $data['note'];
        return $note->save();
    }

    /**
     * @param int $id
     * @param int $userId
     * @return string
     */
    public function delete(int $id, int $userId): bool
    {
        return $this->model->where(['id' => $id, 'user_id' => $userId])->delete();
    }

    /**
     * @param int $id
     * @param int $userId
     * @return mixed
     */
    public function get(int $id, int $userId)
    {
        return $this->model->where(['id' => $id, 'user_id' => $userId])->first();
    }
}