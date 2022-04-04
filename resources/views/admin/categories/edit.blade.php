@extends('admin.master')

@section('title','Productos')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ url('admin/categories/0') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-folder"></i>
        Categorias
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
                        <h5><i class="fa-solid fa-plus"></i> Editar Categoría</h5>
                    </div>
                </div>

                <div class="inside">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-keyboard"></i>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $category->name }}">
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="module" class="form-label">Modulo:</label>
                                    <select class="form-select" aria-label="Default select example" id="module" name="module">
                                        @foreach (getModulesArray() as $key => $item)
                                            <option value="{{ $key }}" {{ $category->module == $key ? 'selected' : ''}}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="icono" class="form-label">Icono:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-keyboard"></i>
                                        </div>
                                        <input type="text" class="form-control" id="icono" name="icono"
                                            value="{{ htmlspecialchars_decode($category->icono) }}">
                                    </div>
                                    @error('icono')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <input type="submit" value="Actualizar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
