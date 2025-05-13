@extends('layouts.app') {{-- The main layout in resources/views/layouts/app.blade.php --}}

@section('title', 'Login - ' . config('app.name'))

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
        .signup-link {
            margin-top: 1rem;
            text-align: center;
        }
        .signup-link a {
            color: #00695c; 
            text-decoration: none;
        }
    </style>

    <div class="auth-form">
        <h2>Login</h2>
        
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('auth') }}">
            @csrf {{-- Laravel CSRF protection --}}
            {{-- <div class="form-control">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">
            </div> --}}
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="signup-link">
            <span>Don't have an account? <a href="{{ route('signup') }}"><span class="signup">Sign-up Instead</span></a></span>
        </div>
    </div>
@endsection