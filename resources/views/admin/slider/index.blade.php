@extends('admin.master')

@section('title','Slider')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('products.index') }}">
        <i class="fa-solid fa-images"></i>
        &nbsp; / &nbsp;
        Slider
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">
                <div class="header">
                    <div class="title">
                        <h2> <i class="fa-solid fa-images"></i> Agregar slider</h2>
                    </div>
                </div>

                <div class="inside">
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="visible" class="form-label">Visible:</label>
                                    <select class="form-select" aria-label="Default select example" id="visible" name="visible">
                                        <option value="1" {{ old('visible') }}>Visible</option>
                                        <option value="0" {{ old('visible') }}>No visible</option>
                                    </select>
                                    @error('visible')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Imagen:</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Contenido:</label>
                                <div class="input-group">
                                    <textarea name="content" id="content" rows="5" class="form-control">{{ old('content') }}</textarea>
                                </div>
                                @error('content')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="order" class="form-label">Orden de aparicion:</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-keyboard"></i>
                                    </div>
                                    <input type="number" class="form-control" id="order" name="order"
                                        value="{{ old('order') }}" min="1">
                                </div>
                                @error('order')
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
    </div>
</div>
@endsection

