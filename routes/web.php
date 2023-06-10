<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AddController;

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

//Send back to View
Route::get('/', function () {
    return view('home');
});

Route::get('/add', function () {
    return view('add');
});

// my-notes.com == '/'
// my-notes/add == '/add'

//Controllers
// Route::get('/add', [AddController::class, 'index']);

Route::get('/', [HomepageController::class, 'index']);

Route::get('/add', [AddController::class, 'index']);



