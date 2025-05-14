<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

// Route::get('/{path?}', [PageController::class, 'show'])->where('path', '.*');



Route::get('/signup', fn () => 
     view('auth.signup'))->name('signup.form'); // Show the signup form

Route::post('/signup', [SignupController::class, 'store'])->name('signup');

Route::get('/auth', [AuthController::class, 'showLoginForm'])->name('login'); // Show Login Form


Route::post('/auth', [AuthController::class, 'login']); // Handle Login Submission

// Route::get('/auth', fn() => view('auth') // Redirect to auth view directly if needed
// )->name('auth');
Route::get('/auth', fn() => view('auth.login'))->name('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Route for users list

// Show form to create a new place
Route::get('/places/create', [PlaceController::class, 'create'])->name('places.create');

// Store the newly created place
Route::post('/places', [PlaceController::class, 'store'])->name('places.store');

Route::get('/users/{userId}/places', [UserController::class, 'show'])->name('user.places');

Route::get('/places', [UserController::class, 'showOwnPlaces'])->name('users.places');

Route::get('/{path?}', [PageController::class, 'show'])->where('path', '.*'); // Catch all route

// Route to display all places of a user
Route::get('/users/{userId}/places', [PlaceController::class, 'index'])->name('user.places');

// Route to show the edit form for a specific place
Route::get('/places/{id}/edit', [PlaceController::class, 'edit'])->name('places.edit');

// Route to handle the update of a specific place
Route::put('/places/{id}', [PlaceController::class, 'update'])->name('places.update');


// Route to delete a specific place
Route::post('/places/delete', [PlaceController::class, 'delete'])->name('places.delete');

Route::post('/logout', function() {
    
    session()->forget('user_id'); // Remove user_id from session
    return redirect('/auth'); // Redirect to authentication page
});

// Route::get('/test-404', function () {
//     abort(404); // Test 404 error
// });