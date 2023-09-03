<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct(
    ) {
    }

    public function getAll()
    {
        return Note::all();
    }

    public function getById(Request $request, string $id)
    {
        $matchingNote = Note::find($id);
        if (strlen($matchingNote) <= 0) {
            return "you done goofed up";
        }
        return $matchingNote;
    }

    public function store(Request $request)
    {
        Note::create([
            'content' => $request["note"],
        ]);
    }
}
