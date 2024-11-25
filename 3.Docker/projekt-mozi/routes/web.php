<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeatsController;
use App\Models\Movies;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layouts.guest');
});
Route::get('/',[MoviesController::class,'GuestMovies'])->name('Movies.guest');
Route::get('/dashboard',[MoviesController::class,'DashboardMovies'])->name('dashbboard');
Route::get('/movies',[MoviesController::class,'index'])->name('Movies.movie');



Route::get('/movies/create',[MoviesController::class,'create'])->name('Movies.create');
Route::post('/movies',[MoviesController::class,'store'])->name('Movies.store');
Route::get('/movies/{movie}/edit',[MoviesController::class,'edit'])->name('Movies.edit');
Route::put('/movies/{movie}/update',[MoviesController::class,'update'])->name('Movies.update');
Route::delete('/movies/{movie}/delete',[MoviesController::class,'delete'])->name('Movies.delete');


//jegyfoglalás
Route::get('/movies/{id}/show', [MoviesController::class, 'show'])->name('movies.show');
Route::get('/movies/{id}/show', [MoviesController::class, 'show'])->name('movies.show');

Route::post('/movies/{id}/store', [MoviesController::class, 'TicketStore'])->name('movies.ticket.store');






Route::get('/register', [RegisteredUserController::class,'store'])->name('user.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/logout', [RegisteredUserController::class, 'delete'])->name('logout');



require __DIR__.'/auth.php';
