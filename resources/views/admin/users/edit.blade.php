@extends('admin.master')

@section('title','Edutar usuarios')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('users.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-users"></i>
        Usuarios
    </a>
    <a href="#">
        &nbsp; / &nbsp;<i class="fa-solid fa-users"></i>
        Edutar usuario
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
                </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
