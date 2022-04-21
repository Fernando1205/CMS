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
                        <h2><i class="fa-solid fa-box"></i> Editar inventario</h2>
                    </div>
                </div>
                <div class="inside">
                    <form action="{{ route('inventory.update', $inventory) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $inventory->name }}">
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
                                <input type="number" class="form-control" id="stock" name="stock"  value="{{ $inventory->stock }}">
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
                                <input type="number" class="form-control" id="price" name="price"  value="{{ $inventory->price }}">
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
                                    <option value="0" {{ $inventory->limit == 0 ? 'selected' : '' }}>Limitado</option>
                                    <option value="1" {{ $inventory->limit == 1 ? 'selected' : '' }}>Ilimitado</option>
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
                                <input type="number" class="form-control" id="min" name="min"  value="{{ $inventory->min }}">
                                @error('min')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2><i class="fa-solid fa-box"></i> Variantes</h2>
                </div>
                <div class="inside">
                    <hr>
                    <form action="{{ route('variant', $inventory) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa nombre de la variante">
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Guardar" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Nombre</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory->variants as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('variant.destroy', $item) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger d-block w-100">
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

    </div>
</div>
@endsection
