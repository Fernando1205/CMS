@extends('admin.master')

@section('title','Permisos usuarios')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('users.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-users"></i>
        Usuarios
    </a>
    <a href="#">
        &nbsp; / &nbsp;<i class="fa-solid fa-user-lock"></i>
        Permisos
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-user">
        <form action="{{ route('users.permission.post', $user) }}" method="POST">
            @csrf

            <div class="row mb-3">
                @include('admin.users.permissions.module_dashboard')
                @include('admin.users.permissions.module_products')
                @include('admin.users.permissions.module_categories')
            </div>

            <div class="row mb-3">
                @include('admin.users.permissions.module_users')
                @include('admin.users.permissions.module_config')
                @include('admin.users.permissions.module_orders')
            </div>

            <div class="row mb-3">
                @include('admin.users.permissions.module_slider')
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel shadow">
                        <div class="inside">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
