<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
    Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
    Route::get('/places/create', [PlaceController::class, 'create'])->name('places.create');
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Route for users list
    Route::get('/places/new', [PlaceController::class, 'create'])->name('places.create');
});
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login'); // Show Login Form
Route::get('/auth', [AuthController::class, 'showLoginForm'])->name('login'); // Show Login Form
Route::post('/auth', [AuthController::class, 'login']); // Handle Login Submission
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/signup', fn () => 
     view('auth.signup'))->name('signup.form'); // Show the signup form

Route::post('/signup', [SignupController::class, 'store'])->name('signup');

Route::get('/auth', fn() => view('auth.login'))->name('auth');

// Route::get('/my-places', [UserController::class, 'showOwnPlaces'])->middleware('auth');

Route::get('/users/{userId}/places', [UserController::class, 'show'])->name('user.places');

Route::get('/{path?}', [PageController::class, 'show'])->where('path', '.*'); // Catch all route

// Route to display all places of a user
Route::get('/users/{userId}/places', [PlaceController::class, 'index'])->name('user.places');

// Route to show the edit form for a specific place
Route::get('/places/{id}/edit', [PlaceController::class, 'edit'])->name('places.edit');

// Route to handle the update of a specific place
Route::put('/places/{id}', [PlaceController::class, 'update'])->name('places.edit');


// Route to delete a specific place
Route::post('/places/delete', [PlaceController::class, 'delete'])->name('places.edit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');