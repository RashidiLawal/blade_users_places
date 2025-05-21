<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PlaceController extends Controller
{
    // Display the places for a specific user
    public function index($userId)
    {
        $places = Place::where('creator_id', $userId)->get(); // Fetch places by user ID
        $user = Auth::user(); // Get authenticated user information (if needed)

        return view('users.places', compact('places', 'user')); // Return to places view
    }

    // public function showOwnPlaces()
    // {
    //     $user = Auth::user(); // Get the currently authenticated user
    //     $places = $user->places; // Assuming you have a 'places' relationship

    //     return view('users.places', compact('user', 'places'));
    // }
    // Show the form for editing a specific place
    public function edit($id)
    {
        // Retrieve the place by ID and ensure the user is the creator or fail with a 404 not found
        $place = Place::where('id', $id)->where('creator_id', Auth::id())->firstOrFail();

        // Ensure the user is the creator
        if (Auth::id() !== $place->creator_id) {
            return Redirect::back()->withErrors('Unauthorized access to edit this place.');
        }

        return view('places.edit', compact('place')); // Return the edit view with the place data
    }

    public function create()
    {
        return view('places.create'); // Show the form to create a new place
    }

    public function storer(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to create a place.');
        }
        // Validate the incoming request
       $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
        ]);

        // dd(Auth::id());
        // dd(Auth::check());
        
        // Place::create([
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        //     'address' => $request->input('address'),
        //     'creator_id' => Auth::id()
        // ]);

        // return redirect()->route('user.places', ['userId' => Auth::id()])->with('success', 'Place added successfully!'); // Redirect to user places with success message

        Place::create([
            ...$validated,
            'creator_id' => Auth::id() // Now guaranteed to have a value
        ]);
    
        return redirect()->route('user.places', ['userId' => Auth::id()])
            ->with('success', 'Place created!');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'address' => 'nullable|string|max:255',
    ]);

    Place::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'address' => $validated['address'],
        'creator_id' => Auth::id() // Correct way to get authenticated user ID
    ]);

    return redirect()->route('users.places')
        ->with('success', 'Place created successfully!');
}
    // Update the specified place
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
        ]);

        // Ensure the place exists and the user is the creator
        $place = Place::where('id', $id)->where('creator_id', Auth::id())->firstOrFail();



        // Ensure the user is the creator
        if (Auth::id() !== $place->creator_id) {
            return Redirect::back()->withErrors('Unauthorized access to update this place.');
        }
        // Update the place with the validated data
        $place->update($request->only(['title', 'description', 'address']));

        // return Redirect::route('user.places', ['userId' => $place->creator_id])->with('success', 'Place updated successfully.');

        return redirect()->route('user.places', ['userId' => $place->creator_id])->with('success', 'Place updated successfully.');
    }
    // Delete a specific place
    public function delete(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
        ]);

        $place = Place::findOrFail($request->place_id);

        // Ensure the user is the creator
        if (Auth::id() !== $place->creator_id) {
            return Redirect::back()->withErrors('Unauthorized access to delete this place.');
        }

        // Delete the place
        $place->delete();

        return Redirect::route('user.places', ['userId' => $place->creator_id])->with('success', 'Place deleted.');
    }
}
