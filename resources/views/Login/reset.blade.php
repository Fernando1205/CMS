@extends('Layout.master')

@section('title', 'Recover')

@section('content')
<div id="login">
    <div class="container h-100">
        <div class="center d-flex justify-content-center align-items-center h-100">
            <div class="card">
                <h5 class="card-header text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" id="logo" width="15%">
                </h5>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    <form method="POST" action="{{ route('resetPass') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope-open"></i></span>
                                <input type="email" class="form-control" placeholder="example@example.com" name="email" required value="{{ $email }}">
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">{{ __('Codigo de recuperación') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock-open"></i></span>
                                <input type="password" class="form-control" placeholder="********" name="code" autocomplete="off">
                                @error('code')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock-open"></i></span>
                                <input type="password" class="form-control" placeholder="********"
                                    name="password" autocomplete="off"  min="8">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">{{ __('Recuperar contraseña') }}</button>
                    </form>
                    <a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    <a href="{{ route('register') }}">No tienes cuenta Registrate</a>

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
