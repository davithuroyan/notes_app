<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 04-Dec-18
 * Time: 12:08 PM
 */

namespace App\Http\Controllers;

use App\Note;
use App\Repositories\NotesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    protected $note;

    public function __construct(Note $note)
    {
        $this->middleware('auth');
        $this->note = new NotesRepository($note);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required|max:50',
            'note' => 'string|required|max:1000',
        ]);

        $userId = Auth::user()->id;
        $title = $request->json()->get('title');
        $note = $request->json()->get('note');

        $note = $this->note->create([
            'title' => $title,
            'note' => $note,
            'user_id' => $userId,
        ]);

        if ($note) {
            return response()->json(['status' => 'success', 'note' => $note]);
        }
        
        return response()->json(['status' => 'fail']);
    }

    public function get($noteId)
    {

    }

    public function getAll()
    {

    }

    public function delete($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}