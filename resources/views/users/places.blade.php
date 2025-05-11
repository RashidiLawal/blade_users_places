@extends('layouts.app')

@section('title', "{$user->name}'s Places - " . config('app.name'))

@section('content')
    <style>
        .places-list {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .place-item {
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .place-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .place-description {
            color: #666;
            margin-bottom: 1rem;
        }
        .place-address {
            color: #666;
            font-style: italic;
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
        .btn-edit {
            background: #00695c;
        }
        .btn-delete {
            background: #c62828;
        }
        .actions {
            margin-top: 1rem;
            display: flex;
            gap: 1rem;
        }
    </style>

    <div class="places-list">
        <h2>{{ htmlspecialchars($user->name) }}'s Places</h2>
        
        @if ($places->isEmpty())
            <p>No places found.</p>
        @else
            @foreach ($places as $place)
                <div class="place-item">
                    <div class="place-title">{{ htmlspecialchars($place->title) }}</div>
                    <div class="place-description">{{ htmlspecialchars($place->description) }}</div>
                    <div class="place-address">{{ htmlspecialchars($place->address) }}</div>
                    
                    @if (Auth::check() && Auth::id() === $place->creator_id)
                        <div class="actions">
                            <a href="{{ route('places.edit', $place->id) }}" class="btn btn-edit">Edit</a>
                            
                            <form action="{{ route('places.delete') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="place_id" value="{{ $place->id }}">
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
