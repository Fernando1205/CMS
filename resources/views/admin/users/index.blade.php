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
            <h2 class="titlte">Usuarios</h2>
        </div>

        <div class="inside">
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>CORREO</td>
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
                            <td>
                                <a href="{{ route('users.update', $user) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('users.destroy', $user) }}"  class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
