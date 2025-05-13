<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
// use Illuminate\Support\Facades\Auth; // For using Laravel authentication
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

         if (!$user) {
        return back()->withErrors(['email' => 'No user found with that email.'])->withInput();
         }

        if ($user && Hash::check($password, $user->password)) {
            // Authentication passed
            session(['user_id' => $user->id, 'user_name' => $user->name]); // Store user info in session
            return redirect('/users'); // Redirect to the all users page.
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput(); // Return back with error
    }
    

    public function logout()
    {
        session()->forget(['user_id', 'user_name']); // Clear session
        return redirect('/auth'); // Redirect to login page
    }
}
