<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Note;

class HomepageController extends Controller
{
    // View
    public function index(): View
    {
        $notes = DB::select('select * from notes');
        return view('home.homepage', ['notes' => $notes]);
    }

    // View Note Details
    public function show($noteId)
    {
        $note = Note::find($noteId);

        $noteContent = [
            'title' => $note->title,
            'date' => $note->date,
            'body' => $note->body,
        ];

        return response()->json($noteContent);
    }

    // Update Note
    public function update(Request $request, $noteId)
    {
        $note = Note::findOrFail($noteId);
        $note->title = $request->input('title');
        $note->body = $request->input('body');

        $note->save();

        // Return the updated note data
        return response()->json([
            'title' => $note->title,
            'body' => $note->body,
        ]);
    }

    // Delete Note
    public function delete($noteId)
    {
        $note = Note::findOrFail($noteId);
        $note->delete();

        return Redirect::route('home.homepage');
    }
}
