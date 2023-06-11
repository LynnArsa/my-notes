<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class AddController extends Controller
{
    public function create()
    {
        return view('notes.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ], [
            'title.required' => 'Title cannot be empty!',
            'body.required' => 'Body cannot be empty!',
        ]);
    
        Note::create($validatedData);
    
        return redirect()->route('home.homepage')->with('success', 'Note created successfully.');
    }
}

