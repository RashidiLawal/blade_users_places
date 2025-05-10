{{-- resources/views/auth/signup.blade.php --}}
@extends('layouts.app') {{-- The main layout in resources/views/layouts/app.blade.php --}}

@section('title', 'Signup - ' . config('app.name'))

@section('content')
    <style>
        .auth-form {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-control {
            margin-bottom: 1rem;
        }
        .form-control label {
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-control input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn {
            background: #00695c;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 1rem;
        }
    </style>

    <div class="auth-form">
        <h2>Signup</h2>
        
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('signup') }}">
            @csrf {{-- Laravel CSRF protection --}}
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-control">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn">Signup</button>
        </form>
    </div>
@endsection