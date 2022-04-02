@extends('admin.master')

@section('title','Productos')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('products.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-boxes-stacked"></i>
        Productos
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <div class="title">
                <h2><i class="fa-solid fa-boxes-stacked"></i>Productos</h2>
            </div>
        </div>
        <div class="inside">
            <div class="btns">
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Crear Producto
                </a>
            </div>
            <table class="table"></table>
        </div>
    </div>
</div>
@endsection
