<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @yield('css')
</head>
<body>

        {{-- INCLUIMOS EL SIDEBAR --}}
        @include('partials.sidebar')
    
    <section>
        @yield('contenido')
    </section>
</body>
</html>