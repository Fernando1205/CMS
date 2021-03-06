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
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <div class="title">
                        <h2><i class="fa-solid fa-pen-to-square"></i> Editar producto</h2>
                    </div>
                </div>
                <div class="inside">
                    <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre del producto:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-keyboard"></i>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $product->name }}">
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
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ?  'selected' : '' }}>{{ $category->name }}</option>
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
                                            value="{{ $product->price }}" min="0" step="any">
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
                                        <option value="0" {{ $product->indiscount == '0' ?  'selected' : '' }}>No</option>
                                        <option value="1" {{ $product->indiscount == '1' ?  'selected' : '' }}>Si</option>
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
                                            value="{{ $product->discount }}" min="0" step="any">
                                        @error('discount')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <select class="form-select" aria-label="Default select example" id="status" name="status">
                                        <option value="0" {{ $product->status == '0' ?  'selected' : '' }}>Borrado</option>
                                        <option value="1" {{ $product->status == '1' ?  'selected' : '' }}>Publico</option>
                                    </select>
                                    @error('status')
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
                                    <label for="stock" class="form-label">Inventario:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-code"></i>
                                        </div>
                                        <input type="number" class="form-control" id="stock" name="stock"
                                            value="{{ $product->stock }}" min="0" step="any">
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
                                            value="{{ $product->code }}">
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
                                        rows="3">{{ $product->content }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel shadow mb-3">
                <div class="header">
                    <div class="title">
                        <h2><i class="fa-solid fa-image"></i> Imagen destacada</h2>
                    </div>
                    <div class="inside">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Producto" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="panel shadow">
                <div class="header">
                    <div class="title">
                        <h2><i class="fa-solid fa-images"></i> Galeria</h2>
                    </div>
                </div>
                <div class="inside">
                    <div class="tumbs">
                        <div class="row">
                            @foreach ($product->gallery as $img)
                            <div class="col-md-6">
                                <div class="card">
                                    <img src="{{ asset('storage/t_'.$img->image) }}" alt="Producto" class="img-fluid">
                                    @if ( keyValueJson(auth()->user()->permissions,'gallery.destroy') )
                                        <div class="card-body m-0 p-0">
                                            <form action="{{ route('gallery.destroy', $img) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger d-block w-100">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if ( keyValueJson(auth()->user()->permissions,'products.gallery') )
                        <form action="{{ route('products.gallery', $product) }}" method="POST" enctype="multipart/form-data" id="formGallery">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control d-none" type="file" id="product_image" name="product_image" accept="image/*" required>
                                @error('product_image')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                        <div class="tumb mb-3">
                            <a href="#" id="btn_product_file_image" class="btn-primary w-full d-block text-center"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
