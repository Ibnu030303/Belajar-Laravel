<?php

use App\Http\Controllers\NoteContorller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::redirect('/', '/note')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/note', [NoteContorller::class, 'index'])->name('note.index');
    // Route::get('/note/create', [NoteContorller::class, 'create'])->name('note.create');
    // Route::get('/note', [NoteContorller::class, 'store'])->name('note.store');
    // Route::get('/note/{id}', [NoteContorller::class, 'show'])->name('note.show');
    // Route::get('/note/{id}/edit', [NoteContorller::class, 'edit'])->name('note.edit');
    // Route::get('/note/{id}', [NoteContorller::class, 'update'])->name('note.update');
    // Route::get('/note/{id}', [NoteContorller::class, 'destroy'])->name('note.destroy');

    // cara untuk menangani route di atas bisa dengan menggunakan method resource
    Route::resource('note', NoteContorller::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
