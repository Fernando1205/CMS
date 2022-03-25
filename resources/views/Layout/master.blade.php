<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS - @yield('title', 'Laravel')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/80c9d698bb.js" crossorigin="anonymous"></script>
        @stack('css')

    </head>
    <body>
        @yield('content')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
