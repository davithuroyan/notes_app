<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 07-Dec-18
 * Time: 11:52 AM
 */

namespace App\Services;


use App\Note;
use App\Repositories\NotesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Exception;

class NoteService
{
    protected $note;

    /**
     * NoteService constructor.
     * @param NotesRepository $note
     */
    public function __construct(NotesRepository $note)
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
}