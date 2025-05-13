@extends('layouts.app') {{-- nav layout in resources/views/layouts/app.blade.php --}}

@section('title', 'Users - ' . config('app.name'))

@section('content')
    <style>
        .users-list {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .user-item {
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-info {
            flex-grow: 1;
        }
        .user-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .user-email {
            color: #666;
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

    <div class="users-list">
        <h2>Users</h2>
        @foreach ($users as $user)
            <div class="user-item">
                <div class="user-info">
                    <div class="user-name">{{ htmlspecialchars($user->name) }}</div>
                    <div class="user-email">{{ htmlspecialchars($user->email) }}</div>
                </div>
                <a href="{{ url("$user->id/places") }}" class="btn">View Places</a>
            </div>
        @endforeach
    </div>
@endsection