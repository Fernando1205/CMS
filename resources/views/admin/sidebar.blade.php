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
            @if ( keyValueJson(auth()->user()->permissions,'dashboard') )
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->is('admin') ?  'active-side' : '' }}">
                        <i class="fa-solid fa-house-chimney"></i>
                        Dashboard
                    </a>
                </li>
            @endif
            @if ( keyValueJson(auth()->user()->permissions,'products.index') )
                <li>
                    <a href="{{ route('products.index') }}" class="{{ request()->is('admin/products*') ?  'active-side' : '' }}">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        Productos
                    </a>
                </li>
            @endif
            @if ( keyValueJson(auth()->user()->permissions,'categories.name.module') )
                <li>
                    <a href="{{ url('admin/categories/0') }}" class="{{ request()->is('admin/categories*') ?  'active-side' : '' }}">
                        <i class="fa-solid fa-folder"></i>
                        Categorías
                    </a>
                </li>
            @endif

            @if ( keyValueJson(auth()->user()->permissions,'users.index') )
                <li>
                    <a href="{{ route('users.index') }}" class="{{ request()->is('admin/users*') ?  'active-side' : '' }}">
                        <i class="fa-solid fa-users"></i>
                        Usuarios
                    </a>
                </li>
            @endif

            @if ( keyValueJson(auth()->user()->permissions,'settings.index') )
            <li>
                <a href="{{ route('settings.index') }}" class="{{ request()->is('admin/settings*') ?  'active-side' : '' }}">
                    <i class="fa-solid fa-gear"></i>
                    Configuraciones
                </a>
            </li>
        @endif

        @if ( keyValueJson(auth()->user()->permissions,'slider.index') )
            <li>
                <a href="{{ route('slider.index') }}" class="{{ request()->is('admin/slider*') ?  'active-side' : '' }}">
                    <i class="fa-solid fa-images"></i>
                    Sliders
                </a>
            </li>
        @endif

        @if ( keyValueJson(auth()->user()->permissions,'config.orders') )
            <li>
                <a href="" class="{{ request()->is('admin/orders*') ?  'active-side' : '' }}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    Ordenes
                </a>
            </li>
        @endif
        </ul>
    </div>
</div>
