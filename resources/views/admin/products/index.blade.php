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
            @if ( keyValueJson(auth()->user()->permissions,'products.store') )
                <div class="btns">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Crear Producto
                    </a>
                </div>
            @endif
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
                        <tr class="{{ $product->status != 1 ? 'table-danger' : ''}}">
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
                                @if ( keyValueJson(auth()->user()->permissions,'products.edit') )
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif
                                @if ( keyValueJson(auth()->user()->permissions,'products.destroy') )
                                    <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">{!! $products->links() !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
