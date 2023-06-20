<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/homepage', [HomepageController::class, 'index'])->name('home.homepage');
    Route::get('/notes/{note}', [HomepageController::class, 'show'])->name('notes.show');
    Route::put('/notes/{note}', [HomepageController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [HomepageController::class, 'delete'])->name('notes.delete');
    Route::get('/add', [AddController::class, 'create'])->name('notes.create');
    Route::post('/add', [AddController::class, 'store']);
    Route::post('/logout', [HomepageController::class, 'logout'])->name('logout');
});


// Public Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
