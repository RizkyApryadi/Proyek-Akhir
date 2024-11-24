<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;


// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Rute untuk Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Genre (CRUD, kecuali show dan index)
Route::middleware('auth')->group(function () {
    Route::resource('genres', GenreController::class)->except(['show', 'index']);
});

// Rute untuk Film (CRUD, kecuali show dan index)
Route::middleware('auth')->group(function () {
    Route::resource('films', FilmController::class)->except(['show', 'index']);
});

// Rute untuk tampilan genre dan film (index dan show yang bisa diakses publik)
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');

// Memuat file auth.php untuk login dan register
require __DIR__.'/auth.php';

// Rute untuk register dan post register
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);


Route::post('/films/{film}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

