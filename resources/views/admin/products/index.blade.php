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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td></td>
                        <td>Nombre:</td>
                        <td>Categoría</td>
                        <td>Precio:</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <a href="{{ asset('storage/'.$product->image) }}"
                                    data-fancybox="gallery"
                                    data-caption="Optional caption">
                                    <img src="{{ asset('storage/t_'.$product->image) }}" alt="Producto" width="64">
                                </a>
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
