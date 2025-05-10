{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Assuming you have your CSS here --}}
</head>
<body>
    @include('shared.navigation') {{-- Include the navigation partial --}}
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>