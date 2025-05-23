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

    // public function showOwnPlaces()
    // {
    //     $user = Auth::user(); // Get the currently authenticated user
    //     $places = $user->places; // fetch places base on a relationship

    //     return view('users.places', compact('user', 'places'));
    // }
    public function show($userId)
    {
        // dd($userId);
        $user = User::findOrFail($userId);
        $places = $user->places;// Using the relationship, fetch places base on a relationship
       
        // $places = Place::where('creator_id', $userId)->get();
        
        // return view('users.places', compact('user', 'places'));
        return view('users.places', [
            'user' => $user,  // Make sure this is SINGULAR 'user'
            'places' => $places
        ]);
    }
}
