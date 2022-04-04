<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="routeName" content="{{ Route::currentRouteName() }}">
        <title>CMS - @yield('title', 'Laravel')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="https://kit.fontawesome.com/80c9d698bb.js" crossorigin="anonymous"></script>
        @stack('css')

    </head>
    <body>
        <div class="wrapper">
            <div class="col1">
                @include('admin.sidebar')
            </div>
            <div class="col2">
                <nav class="navbar navbar-expand-lg shadow">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa-solid fa-house-chimney"></i>
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="page">
                    <div class="container-fluid">
                        <nav aria-label="breadcrum shadow">
                            <ol class="breadcrum">
                                <li class="breadcrum-item">
                                    <a href="{{ route('dashboard') }}">
                                        <i class="fa-solid fa-house-chimney"></i>
                                        Dashboard
                                    </a>
                                </li>
                                @yield('breadcrum')

                            </ol>
                        </nav>
                    </div>
                </div>

                @yield('content')
            </div>

        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        {{-- JQUERY --}}
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        {{-- CKEDITOR4 --}}
        <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
        <script>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.warning("{{ $error }}");
            @endforeach
            @endif
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @elseif (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        </script>
        @stack('script')
    </body>
</html>
