<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 07-Dec-18
 * Time: 11:52 AM
 */

namespace App\Services;


use App\Note;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Exception;

class NoteService implements ServiceInterface
{
    protected $note;

    /**
     * NoteService constructor.
     * @param RepositoryInterface $note
     */
    public function __construct(RepositoryInterface $note)
    {
        $this->note = $note;
    }

    /**
     * @param Request $request
     * @param int $userId
     * @return Note
     * @throws \Exception
     */
    public function create(Request $request, int $userId): Note
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required|max:50',
            'note' => 'string|required|max:1000',
        ]);

        if ($validator->fails()) {
            throw  new Exception($validator->errors());
        }
        $attributes = $request->all();
        $attributes['user_id'] = $userId;
        return $this->note->create($attributes, $userId);
    }

    /**
     * @param Request $request
     * @param int $id
     * @param int $userId
     * @return bool
     * @throws \Exception
     */
    public function update(Request $request, int $id, int $userId): bool
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required|max:50',
            'note' => 'string|required|max:1000',
        ]);

        if ($validator->fails()) {
            throw  new Exception($validator->errors());
        }
        $attributes = $request->all();
        return $this->note->update($attributes, $id, $userId);
    }

    /**
     * @param int $id
     * @param int $userId
     * @return mixed
     */
    public function get(int $id, int $userId)
    {
        return $this->note->get($id, $userId);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function all(int $userId)
    {
        return $this->note->all($userId);
    }


    /**
     * @param int $id
     * @param int $userId
     * @return string
     */
    public function delete(int $id, int $userId): bool
    {
        return $this->note->delete($id, $userId);
    }
}