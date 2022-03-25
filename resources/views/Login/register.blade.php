@extends('Layout.master')

@section('title', 'Registro')

@section('content')
<div id="login">
    <div class="container h-100">
        <div class="center d-flex justify-content-center align-items-center h-100">
            <div class="card">
                <h5 class="card-header text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" id="logo" width="15%">
                </h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('registerUser') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nombre') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Fernando"
                                    name="name" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user-group"></i></span>
                                <input type="text" class="form-control" placeholder="Lopez"
                                    name="lastname" value="{{ old('lastname') }}" required>
                            </div>
                            @error('lastname')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-envelope-open"></i></span>
                                <input type="email" class="form-control" placeholder="example@example.com"
                                    name="email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock-open"></i></span>
                                <input type="password" class="form-control" placeholder="********"
                                    name="password" autocomplete="off" required min="8">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock-open"></i></span>
                                <input type="password" class="form-control" placeholder="********"
                                    name="passwordConfirm" autocomplete="off" required min="8">
                            </div>
                            @error('passwordConfirm')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">{{ __('Registrarse') }}</button>
                    </form>
                    <a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    <a href="">Recuperar contraseña</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@push('css')
    <style>
        #login {
            height: 100vh;
        }
        .card {
            width: 400px;
        }
    </style>
@endpush
