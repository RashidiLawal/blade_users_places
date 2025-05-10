{{-- resources/views/shared/navigation.blade.php --}}
<nav class="main-navigation">
    <div class="nav-logo">
        <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <ul class="nav-links">
        <li><a href="{{ url('/') }}">All Users</a></li>
        @if (session()->has('user_id'))
            <li><a href="{{ url('places/new') }}">Add Place</a></li>
            <li>
                <form action="{{ url('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-link">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ url('auth') }}">Login</a></li>
        @endif
    </ul>
</nav>

<style>
    .main-navigation {
        background: #292929;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
       -items: center;
    }
    .nav-logo a {
        color: white;
        text-decoration: none;
        font-size: 1.5rem;
        font-weight: bold;
    }
    .nav-links {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 1rem;
    }
    .nav-links a {
        color: white;
        text-decoration: none;
    }
    .btn-link {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        font-size: 1rem;
        padding: 0;
    }
</style>