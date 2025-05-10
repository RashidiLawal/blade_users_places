{{-- resources/views/places/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Place - ' . config('app.name'))

@section('content')
<div class="container">
    <div class="place-form">
        <h2>Add New Place</h2>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form to add a new place --}}
        <form action="{{ route('places.store') }}" method="POST">
            @csrf {{-- Include CSRF token for security --}}
            
            <div class="form-control">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-control">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            
            <div class="form-control">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Place</button>
        </form>
    </div>
</div>

<style>
    .place-form {
        max-width: 600px;
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
    .form-control input,
    .form-control textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    .form-control textarea {
        height: 150px;
        resize: vertical;
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
    .success {
        color: green;
        margin-bottom: 1rem;
    }
</style>
@endsection