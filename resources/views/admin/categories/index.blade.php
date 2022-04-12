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
        @if ( keyValueJson(auth()->user()->permissions,'categories.create') )
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <div class="title">
                            <h5><i class="fa-solid fa-plus"></i> Agregar Categoría</h5>
                        </div>
                    </div>

                    <div class="inside">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre:</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fa-solid fa-keyboard"></i>
                                            </div>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}">
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
                                                <option value="{{ $key }}" {{ old('module') == $key ? 'selected' : ''}}>{{ $item }}</option>
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
                                                value="{{ old('icon') }}">
                                        </div>
                                        @error('icono')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <div class="title">
                        <h5><i class="fa-solid fa-folder"></i> Categoría</h5>
                    </div>
                </div>

                <div class="inside">
                    <ul class="nav nav-pills">
                        @foreach (getModulesArray() as $key => $cat)
                            <li class="nav-item active">
                                <a class="nav-link bg-primary text-white ms-1" aria-current="page"
                                    href="{{ route('categories.name.module', $key) }}">
                                    <i class="fa-solid fa-list"></i>
                                     {{ $cat }}
                                    </a>
                            </li>
                        @endforeach
                    </ul>
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="32px"></td>
                                <td>Nombre</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{!! htmlspecialchars_decode($cat->icono) !!}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        @if ( keyValueJson(auth()->user()->permissions,'categories.edit') )
                                            <a href="{{ route('categories.edit', $cat) }}" class="btn btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        @endif
                                        @if ( keyValueJson(auth()->user()->permissions,'categories.destroy') )
                                            <form action="{{ route('categories.destroy', $cat) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </form>
                                        @endif
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
