<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class PageController extends Controller
// {
    
// }
// class PageController extends Controller
// {
//     public function show($path = '')
//     {
//         switch ($path) {
//             case '':
//             case '/':
//                 if (isLoggedIn()) {
//                     return view('users.pages.users'); // Assuming the view exists
//                 } else {
//                     return redirect()->route('auth'); // Redirect to auth route
//                 }

//             case 'auth':
//                 if (!isLoggedIn()) {
//                     return view('users.pages.auth'); // Assuming the view exists
//                 } else {
//                     return redirect('/'); // Redirect to home
//                 }

//             case 'places/new':
//                 if (isLoggedIn()) {
//                     return view('places.pages.new_place'); // Assuming the view exists
//                 } else {
//                     return redirect()->route('auth'); // Redirect to auth route
//                 }

//             case preg_match('/^(\d+)\/places$/', $path, $matches) ? true : false:
//                 $userId = $matches[1]; // Extract user ID
//                 return view('places.pages.user_places', compact('userId'));

//             case preg_match('/^places\/(\d+)$/', $path, $matches) ? true : false:
//                $placeId = $matches[1]; // Extract place ID
//                 if (isloggedIn()) {
//                     return view('places.pages.update_place', compact('Id'));
//                 } else {
//                     return redirect()->route('auth'); // Redirect to auth route
//                 }

//             default:
//                (404); //Handle 404 error
//         }
//     }

//     private function isLoggedIn()
//     {
//         // Implement your logic to check if a user is logged in
//         return session()->has('user'); // Example session check
//     }
// }

class PageController extends Controller
{
    public function show($path = '')
    {
        switch ($path) {
            case '':
            case '/':
                if ($this->isLoggedIn()) {
                    return view('users.index');
                } else {
                    return redirect()->route('signup');
                }

            case 'auth':
                if (!$this->isLoggedIn()) {
                    return view('auth.signup'); 
                } else {
                    return redirect()->route('users.index'); 
                }

            case 'places/new':
                if ($this->isLoggedIn()) {
                    return view('places.create');  
                } else {
                    return redirect()->route('auth');
                }

            case preg_match('/^(\d+)\/places$/', $path, $matches) ? true : false:
                $userId = $matches[1];
                return view('users.places', compact('userId')); 

            case preg_match('/^places\/(\d+)$/', $path, $matches) ? true : false:
                $placeId = $matches[1];
                if ($this->isLoggedIn()) {
                    return view('places.edit', compact('placeId')); 
                } else {
                    return redirect()->route('auth');
                }

            default:
                return response()->view('errors.404', [], 404); // Handle 404
        }
    }

    private function isLoggedIn()
    {
        return session()->has('user_id'); // Check if user is logged in
    }
}