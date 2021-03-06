@extends('admin.master')

@section('title','Editar usuarios')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('users.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-users"></i>
        Usuarios
    </a>
    <a href="#">
        &nbsp; / &nbsp;<i class="fa-solid fa-users"></i>
        Editar usuario
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="titlte"><i class="fa-solid fa-user"></i> Información</h2>
                </div>

                <div class="inside">
                    @if (is_null($user->avatar))
                        <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar" class="img-fluid rounded d-block m-auto" width="150px">
                    @else
                        <img src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar" class="img-fluid rounded d-block m-auto" width="150px">
                    @endif
                    <div class="info m-auto text-center">
                        <span class="d-block fw-bold fs-5"><i class="fa-solid fa-address-card"></i> Nombre:</span>
                        <p class="text-strong">{{ $user->full_name }}</p>

                        <span class="d-block fw-bold fs-5"><i class="fa-solid fa-envelope"></i> Correo electrónico:</span>
                        <p class="text-strong">{{ $user->email }}</p>

                        <span class="d-block fw-bold fs-5"><i class="fa-solid fa-user-tag"></i> Rol:</span>
                        <p class="text-strong">{{ $user->role_name }}</p>

                        <span class="d-block fw-bold fs-5"><i class="fa-solid fa-circle-check"></i> Estado del usuario:</span>
                        <p class="text-strong">{{ $user->status_name }}</p>

                        <span class="d-block fw-bold fs-5"><i class="fa-solid fa-calendar-days"></i>  Fecha de registro:</span>
                        <p class="text-strong">{{ $user->created_at }}</p>
                    </div>
                </div>
                @if ( keyValueJson(auth()->user()->permissions,'users.destroy') )
                    @if (!$user->status == 100)
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="{{ route('users.destroy', $user) }}" class="btn btn-danger d-block w-100">Suspender Usuario</button>
                        </form>
                    @else
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="{{ route('users.destroy', $user) }}" class="btn btn-success d-block w-100">Activar Usuario</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="titlte">
                        <i class="fa-solid fa-user-pen"></i>
                        Editar informacion
                    </h2>
                </div>

                <div class="inside">
                    @if ( keyValueJson(auth()->user()->permissions,'users.edit') )
                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Tipo de usuario:</label>
                                        <select class="form-select" aria-label="Default select example" id="role" name="role">
                                            <option value="1" {{ $user->role == 1 ? 'selected' : ''}}>Administrador</option>
                                            <option value="0" {{ $user->role == 0 ? 'selected' : ''}}>Usuario Normal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Guardar" class="btn btn-success">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
