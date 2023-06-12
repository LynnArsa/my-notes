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

    public function show($notesId)
    {
        $note = Note::find($notesId);

        $noteContent = [
            'title' => $note->title,
            'date' => $note->date,
            'body' => $note->body,
        ];

        return response()->json($noteContent);
    }
    
    
}
