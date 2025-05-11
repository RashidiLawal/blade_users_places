@extends('layouts.app') 

@section('title', 'Update Place - ' . $place->title)

@section('content')
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

<div class="container">
    <h2>Update Place</h2>

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

    {{-- Form to update the place --}}
    <form action="{{ route('places.update', $place->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Specify that we are making a PUT request --}}
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $place->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $place->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $place->address) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Place</button>
    </form>
</div>
@endsection