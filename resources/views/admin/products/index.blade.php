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
                <div class="btns d-inline">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Crear Producto
                    </a>
                </div>
            @endif
            <div class="dropdown d-inline-block">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Filtrar
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('products.index') }}"><i class="fa-solid fa-list"></i> Todos</a></li>
                    <li><a class="dropdown-item" href="{{ route('products.filter', 1) }}"><i class="fa-solid fa-user-clock"></i> Publicos</a></li>
                    <li><a class="dropdown-item" href="{{ route('products.filter', 0) }}"><i class="fa-solid fa-eraser"></i> Borrador</a></li>
                    <li><a class="dropdown-item" href="{{ route('products.filter', ['status' => 'trash']) }}"><i class="fa-solid fa-trash"></i> Papelera</a></li>
                </ul>
            </div>
            <div class="d-inline my-3">
                <form action="{{ route('products.search') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group my-3 ">
                                <input type="text" class="form-control" placeholder="Buscar" name="text" id="text">
                            </div>
                        </div>
                    <div class="col-md-5">
                        <div class="input-group my-3 ">
                            <select name="search" id="search" class="form-select">
                                <option value="name">Nombre</option>
                                <option value="code">Codigo</option>
                            </select>
                        </div>
                    </div>
                   <div class="col-md-2">
                        <div class="input-group my-3 ">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                   </div>
                </form>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td></td>
                        <td>Nombre:</td>
                        <td>Codigo:</td>
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
                            <td>{{ $product->name }} {!! $product->status != 1 ? '<i class="fa-solid fa-eraser"></i>' : '' !!}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if ( keyValueJson(auth()->user()->permissions,'products.edit') )
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif
                                @if ( keyValueJson(auth()->user()->permissions,'products.destroy') )
                                    @if (is_null($product->deleted_at))
                                        <form method="post" class="d-inline" id="formDeleteProduct">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger product-delete" data-product="{{ $product->id }}" data-action="delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form method="post" class="d-inline" id="formDeleteProduct">
                                            @csrf
                                            <button class="btn btn-success product-delete" data-product="{{ $product->id }}" data-action="restore">
                                                <i class="fa-solid fa-recycle"></i>
                                            </button>
                                        </form>
                                    @endif
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
@push('script')
<script src="{{ asset('js/product.js') }}"></script>
@endpush
