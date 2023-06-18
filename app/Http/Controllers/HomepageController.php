<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Note;

class HomepageController extends Controller
{
    // View
    public function index(): View
    {
        $user = Auth::user();
        $notes = $user->notes()->orderByDesc('notes_id')->get(); // Order by 'id'
        return view('home.homepage')
            ->with('notes', $notes)
            ->with('user', $user);
    }
    

    // View Note Details
    public function show($noteId)
    {
        $note = Note::findOrFail($noteId);

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
        $note->date = $request->input('date');
        $note->body = $request->input('body');

        $note->save();

        // Return the updated note data
        return response()->json([
            'title' => $note->title,
            'date' => $note->date,
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

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
