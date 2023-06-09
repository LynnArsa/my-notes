<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class home extends Controller
{
    public function index() {
        $title = "Insert Notes Here";
        
        return view('add.index', [
            'title' => $title
        ]);
    }
}
