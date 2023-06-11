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
        ]);
    
        Note::create($validatedData);
    
        return redirect()->route('home.homepage')->with('success', 'Note created successfully.');
    }
}

