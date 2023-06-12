<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Note;

class HomepageController extends Controller
{
    public function index(): View
    {
        $notes = DB::select('select * from notes');
        return view('home.homepage', ['notes' => $notes]);
    }

    // public function show($notesId)
    // {
    //     // Retrieve the note from the database based on the notesId
    //     $note = Note::find($notesId);
    
    //     // Return the note content as a response
    //     return response()->json($note);
    // }

    public function show($notesId)
    {
        // Retrieve the note from the database based on the noteId
        $note = Note::find($notesId);
    
        // Customize the output format using Tailwind CSS classes
        $noteContent = '<div class="font-bold text-4xl">' . $note->title . '</div>'
                       . '<div class="mb-4">' . $note->date . '</div>'
                       . '<div>' . $note->body . '</div>';
    
        // Return the note content as a response
        return response($noteContent);
    }
    
    
}
