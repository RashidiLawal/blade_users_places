{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app') {{-- Assuming you have a general layout file --}}

@section('title', '404 Not Found - ' . config('app.name'))

@section('content')
    <style>
        .error-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            text-align: center;
        }
        .error-title {
            font-size: 2rem;
            color: #d32f2f;
            margin-bottom: 1rem;
        }
        .error-message {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .btn {
            background: #00695c;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: inline-block;
        }
    </style>

    <div class="error-container">
        <h1 class="error-title">404 Not Found</h1>
        <p class="error-message">The page you are looking for does not exist.</p>
        <a href="{{ url('/') }}" class="btn">Go to Home</a>
    </div>
@endsection