<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 04-Dec-18
 * Time: 12:08 PM
 */

namespace App\Http\Controllers;

use App\Services\NoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    protected $noteService;

    public function __construct(NoteService $service)
    {
        $this->middleware('auth');
        $this->noteService = $service;
    }

    public function create(Request $request)
    {
        $userId = Auth::user()->id;
        $note = $this->noteService->create($request, $userId);
        if ($note) {
            return response()->json(['status' => 'success', 'note' => $note]);
        }

        return response()->json(['status' => 'fail']);
    }

    public function get($noteId)
    {
        $userId = Auth::user()->id;
        $note = $this->noteService->get($noteId, $userId);

        if ($note) {
            return response()->json(['status' => 'success', 'note' => $note]);
        }
        return response()->json(['status' => 'fail']);
    }

    public function all()
    {
        $userId = Auth::user()->id;
        $notes = $this->noteService->all($userId);

        if (!empty($notes)) {
            return response()->json(['status' => 'success', 'notes' => $notes]);
        }
        return response()->json(['status' => 'fail']);
    }

    public function delete($id)
    {
        $userId = Auth::user()->id;
        if ($this->noteService->delete($id, $userId)) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }

    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;

        $result = $this->noteService->update($request, $id, $userId);

        if ($result) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }
}