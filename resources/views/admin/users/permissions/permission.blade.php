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
    <div class="row mb-3">
        @include('admin.users.permissions.module_dashboard')
        @include('admin.users.permissions.module_products')
        @include('admin.users.permissions.module_categories')
    </div>
    <div class="row">
        @include('admin.users.permissions.module_users')
    </div>
</div>
@endsection
