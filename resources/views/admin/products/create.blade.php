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

    <div class="panel shadow">
        <div class="header">
            <div class="title">
                <h2><i class="fa-solid fa-boxes-stacked"></i>Agregar producto</h2>
            </div>
        </div>
        <div class="inside">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del producto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categor??a:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ?  'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen Destacada:</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" >
                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                </div>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}" min="0" step="any">
                                @error('price')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="indiscount" class="form-label">Descuento:</label>
                            <select class="form-select" aria-label="Default select example" id="indiscount" name="indiscount">
                                <option value="0" {{ old('indiscount') == '0' ?  'selected' : '' }}>No</option>
                                <option value="1" {{ old('indiscount') == '1' ?  'selected' : '' }}>Si</option>
                            </select>
                            @error('indiscount')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="discount" class="form-label">Descuento:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-percent"></i>
                                </div>
                                <input type="number" class="form-control" id="discount" name="discount"
                                    value="{{ old('discount') }}" min="0" step="any">
                                @error('discount')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Inventario:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-code"></i>
                                </div>
                                <input type="number" class="form-control" id="stock" name="stock"
                                    value="{{ old('stock') }}" min="0" step="any">
                                @error('stock')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="code" class="form-label">Codigo de sistema:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </div>
                                <input type="text" class="form-control" id="code" name="code"
                                    value="{{ old('code') }}">
                                @error('code')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="content" class="form-label">Descripci??n</label>
                            <textarea class="form-control" id="content" name="content"
                                rows="3">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
              </form>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        CKEDITOR.replace( 'content', {
            toolbar: [
                { name:'clipborad',items:['Cut','Paste','PasteText','-','Undo','Redo'] },
                { name:'basicstyles', items:['Bold','Italic','BulletedList','Strike','Imagen','Link','Unlike','Blockquote']},
                { name:'document', items: ['CodeSnippet','EmojiPanel','Preview','Source']}
            ]
        } );
    </script>
@endpush
