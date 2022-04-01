<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid">
        </div>

        <div class="user">
            <span class="subtitle">Hola:</span>
            <div class="name">
                {{ auth()->user()->name }} {{ auth()->user()->lastname}}
                <a href="{{ route('logout') }}" title="Logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
            <div class="email">
                {{ auth()->user()->email }}
            </div>
        </div>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house-chimney"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Productos
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa-solid fa-users"></i>
                    Usuarios
                </a>
            </li>
        </ul>
    </div>
</div>
