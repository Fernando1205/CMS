@extends('admin.master')

@section('title','Usuarios')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('users.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-users"></i>
        Usuarios
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-users"></i> Usuarios</h2>
        </div>

        <div class="inside">
            <div class="row">
                <div class="col-md-2 offset-md-10" style="width: 100%">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-filter"></i> Filtrar
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="{{ route('users.index') }}"><i class="fa-solid fa-list"></i> Todos</a></li>
                          <li><a class="dropdown-item" href="{{ route('users.filter', 0) }}"><i class="fa-solid fa-user-clock"></i> No verificados</a></li>
                          <li><a class="dropdown-item" href="{{ route('users.filter', 1) }}"><i class="fa-solid fa-user-check"></i> Verificados</a></li>
                          <li><a class="dropdown-item" href="{{ route('users.filter', 100) }}"><i class="fa-solid fa-user-large-slash"></i> Suspendidos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>CORREO</td>
                        <td>ESTADO</td>
                        <td>ROL</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status_name }}</td>
                            <td>{{ $user->role_name  }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('users.permission', $user) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-user-lock"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">{{ $users->links() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
