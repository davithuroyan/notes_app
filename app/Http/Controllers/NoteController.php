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

class NoteController extends Controller
{
    protected $note;

    public function __construct(Note $note)
    {
        $this->note = new NotesRepository($note);
    }

    public function create(Request $request)
    {

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