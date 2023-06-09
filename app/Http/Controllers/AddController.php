<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AddController extends Controller
{
    public function index(): View
    {
        $notes = DB::select('select * from notes');
 
        return view('add.index', ['notes' => $notes]);
    }
}