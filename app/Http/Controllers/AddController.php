<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class AddController extends Controller
{
    public function create()
    {
        return view('notes.add');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate the input
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create a new note with the provided title and body
        $note = new Note();
        $note->title = $request->input('title');
        $note->body = $request->input('body');

        // Associate the note with the user by setting the user_id
        $note->user_id = $user->id;

        // Save the note
        $note->save();

        return redirect()->route('home.homepage')->with('success', 'Note created successfully.');
    }
}
