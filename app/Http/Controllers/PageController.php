<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function show($path = '')
    {
        switch ($path) {
            case '':
            case '/':
                if ($this->isLoggedIn()) {
                    return view('users.index'); // Your users view
                } else {
                    return redirect()->route('auth');
                }

            case 'auth':
                if (!$this->isLoggedIn()) {
                    return view('users.pages.auth'); 
                } else {
                    return redirect()->route('auth'); 
                }

            case 'places/new':
                if ($this->isLoggedIn()) {
                    return view('places.pages.new_place'); 
                } else {
                    return redirect()->route('auth');
                }

            case preg_match('/^(\d+)\/places$/', $path, $matches) ? true : false:
                $userId = $matches[1];
                return view('places.pages.user_places', compact('userId')); 

            case preg_match('/^places\/(\d+)$/', $path, $matches) ? true : false:
                $placeId = $matches[1];
                if ($this->isLoggedIn()) {
                    return view('places.pages.update_place', compact('placeId')); 
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