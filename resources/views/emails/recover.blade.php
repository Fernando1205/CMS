@extends('emails.master')
@section('content')
    <h1 style="text-align: center">Hola {{ $user->name }}</h1>
    <p style="text-align: center">Recuperación de contraseña del correo <strong>{{ $user->email }}</strong></p>
    <p style="text-align: center">Para continuar haga click en el siguiente botón e ingresé el siguiente código:</p>
    <p style="text-align: center; font-size: 2em"><strong>{{ $code }}</strong></p>
    <a href="{{ route('reset', ['email' => $user->email]) }}"
    style="background-color: #ff291a; border: 1px solid; border-radius: 10px; padding: 16px; color: #fff; display: block; margin: auto; width: 30%; text-align: center;
        text-decoration: none"
    >Recuperar contraseña</a>
    <p>Si el botón anterior no le funciona copie y pegue la siguiente url en su navegador: </p>
    <p><strong>{{ route('reset', ['email' => $user->email]) }}</strong></p>
@endsection
