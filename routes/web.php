<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::redirect('/','/note')->name('notes.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group( function() {

Route::get('/', [NoteController::class, 'index'])->name('notes.index');
Route::get('/note/create',[NoteController::class, 'create'])->name('notes.create');
Route::post('/note/store',[NoteController::class, 'store'])->name('notes.store');
Route::get('/note/{note}',[NoteController::class, 'show'])->name('notes.show');
Route::get('/note/{note}/edit',[NoteController::class, 'edit'])->name('notes.edit');
Route::put('/note/{note}',[NoteController::class, 'update'])->name('notes.update');
Route::delete('/note/{note}',[NoteController::class, 'destroy'])->name('notes.destroy');

});



