@extends('Layout.master')

@section('title', 'Login')

@section('content')
<div id="login">
    <div class="container h-100">
        <div class="center d-flex justify-content-center align-items-center h-100">
            <div class="card">
                <h5 class="card-header text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" id="logo" width="15%">
                </h5>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope-open"></i></span>
                                <input type="text" class="form-control" placeholder="example@example.com" name="email">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock-open"></i></span>
                                <input type="password" class="form-control" placeholder="********" name="password" autocomplete="off">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                    </form>
                    <a href="{{ route('register') }}">No tienes cuenta Registrate</a>
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
