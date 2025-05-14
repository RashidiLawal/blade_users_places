<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect; 
// use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('users.index', compact('users')); // Return the view with users
    }

    public function showOwnPlaces()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $places = $user->places; // Assuming you have a 'places' relationship

        return view('users.places', compact('user', 'places'));
    }
    public function show($userId)
    {
        // Redirect to auth if no userId provided
        if (!$userId) {
            return redirect('/auth');
        }

        // Get user information
        $user = User::find($userId);
        if (!$user) {
            return redirect('/auth'); // Redirect if user is not found
        }

        // Get user's places
        $places = Place::where('creator_id', $userId)->get();
        
        return view('users.places', compact('user', 'places')); // Return user and places to the view
    }
}
