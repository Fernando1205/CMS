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
    <div class="panel shadow">
        <div class="header">
            <div class="title">
                <h2><i class="fa-solid fa-boxes-stacked"></i>Agregar producto</h2>
            </div>
        </div>
        <div class="inside">
            <form action="" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre del producto:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoría:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ old('category') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen Destacada:</label>
                            <input class="form-control" type="file" id="image" name="image">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="indiscount" class="form-label">Descuento:</label>
                            <select class="form-select" aria-label="Default select example" id="indiscount" name="indiscount">
                                <option selected value="0">No</option>
                                <option value="1">Si</option>
                            </select>
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="3">{{ old('description') }}</textarea>
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
        CKEDITOR.replace( 'description', {
            toolbar: [
                { name:'clipborad',items:['Cut','Paste','PasteText','-','Undo','Redo'] },
                { name:'basicstyles', items:['Bold','Italic','BulletedList','Strike','Imagen','Link','Unlike','Blockquote']},
                { name:'document', items: ['CodeSnippet','EmojiPanel','Preview','Source']}
            ]
        } );
    </script>
@endpush
