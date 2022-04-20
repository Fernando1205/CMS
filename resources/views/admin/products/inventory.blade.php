@extends('admin.master')

@section('title','Productos')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('products.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-boxes-stacked"></i>
        Productos
    </a>
</li>
<li class="breadcrum-item">
    <a href="{{ route('products.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-plus"></i>
        Agregar producto
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <div class="title">
                        <h2><i class="fa-solid fa-box"></i> Crear inventario</h2>
                    </div>
                </div>
                <div class="inside">
                    <form action="{{ route('inventory.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Cantidad de inventario:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="number" class="form-control" id="stock" name="stock">
                                @error('stock')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Precio:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="number" class="form-control" id="price" name="price">
                                @error('price')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="limit" class="form-label">Limite de inventario:</label>
                            <div class="input-group">
                                <select name="limit" id="limit" class="form-select">
                                    <option value="0">Limitado</option>
                                    <option value="1">Ilimitado</option>
                                </select>
                                @error('limit')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="min" class="form-label">Inventario minimo:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="number" class="form-control" id="min" name="min">
                                @error('min')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2><i class="fa-solid fa-box"></i> Inventario</h2>
                </div>
                <div class="inside">
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Nombre</td>
                                <td>Existencias</td>
                                <td>Minimo</td>
                                <td>Precio</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if ($item->stock == 0)
                                        <td>Limitado</td>
                                    @else
                                        <td>Ilimitado</td>
                                    @endif
                                    <td>{{ $item->min }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
