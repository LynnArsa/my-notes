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

// Send back to View
Route::get('/homepage', [HomepageController::class, 'index'])->name('home.homepage');
Route::get('/notes/{note}', [HomepageController::class, 'show'])->name('notes.show');
Route::put('/notes/{note}', [HomepageController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [HomepageController::class, 'delete'])->name('notes.delete');

// Add
Route::get('/add', [AddController::class, 'create'])->name('notes.create');
Route::post('/add', [AddController::class, 'store']);

// Edit
Route::get('/edit/{note}', [AddController::class, 'edit'])->name('notes.edit');