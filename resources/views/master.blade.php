<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="routeName" content="{{ Route::currentRouteName() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="auth" content="{{ Auth::id() }}">
        <title>CMS - @yield('title', 'Laravel')</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <script src="https://kit.fontawesome.com/80c9d698bb.js" crossorigin="anonymous"></script>
       <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        @stack('css')

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item pe-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Inicio</a>
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-store"></i> Tienda</a>
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-building"></i> Sobre nosotros</a>
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-address-book"></i> Contacto</a>
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-cart-shopping"></i> <span>0</span></a>
                        </li>
                        @guest
                            <li class="nav-item pe-3">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-circle-user"></i> Mi cuenta</a>
                            </li>
                            <li class="nav-item pe-3">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Crear cuenta</a>
                            </li>
                        @endguest
                        @auth
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-circle-user"></i> {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if (auth()->user()->role == 1)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-user-shield"></i> Administración</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('perfil.edit', ['perfil' => auth()->user()->id]) }}"><i class="fa-solid fa-user-pen"></i> Editar Información</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('perfil.edit', ['perfil' => auth()->user()->id]) }}"><i class="fa-solid fa-heart"></i>  Favoritos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>

                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            <div class="col2">
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        {{-- JQUERY --}}
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        {{-- Slick carouse --}}
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
