<?php

use App\Http\Controllers\ProfileController;



use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes (Guest access)
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Authenticated Routes (for any logged-in user, no role checks yet)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Profile routes are handled by Breeze
    // For now, these are just placeholders for future development
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::get('/loans', function() { return view('loans.index'); })->name('loans.index');
    Route::get('/reservations', function() { return view('reservations.index'); })->name('reservations.index');
    Route::get('/fines', function() { return view('fines.index'); })->name('fines.index');
    Route::get('/users', function() { return view('users.index'); })->name('users.index');
    Route::get('/users/create', function() { return view('users.create'); })->name('users.create');
    Route::get('/users/{user}/edit', function() { return view('users.edit'); })->name('users.edit');
    Route::get('/my-books', function() { return view('my_books.index'); })->name('my.books');
    Route::get('/my-fines', function() { return view('my_fines.index'); })->name('my.fines');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
