<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function index(): View
    {
        $notes = DB::select('select * from notes');
        return view('home', ['notes' => $notes]);
    }
}