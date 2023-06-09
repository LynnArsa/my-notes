<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//View
Route::get('/homepage', function () {
    return view('home');
});

// my-notes.com == '/'
// my-notes/add == '/add'

//Controllers
// Route::get('/add', [AddController::class, 'index']);

Route::get('/homepage', [HomepageController::class, 'index']);



