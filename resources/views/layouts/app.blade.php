<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>
    @include('shared.navigation') {{-- Includes the navigation partial --}}
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>