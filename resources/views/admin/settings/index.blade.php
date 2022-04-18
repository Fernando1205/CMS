@extends('admin.master')

@section('title','Configuraciones')

@section('breadcrum')
<li class="breadcrum-item">
    <a href="{{ route('products.index') }}">
        &nbsp; / &nbsp;<i class="fa-solid fa-gear"></i>
        Configuraciones
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <div class="title">
                <h2><i class="fa-solid fa-gear"></i>Configuraciones</h2>
            </div>
        </div>

        <div class="inside">
            <form action="{{ route('settings') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la tienda:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Config::get('madecms.name') }}" placeholder="MI TIENDA">
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="currency" class="form-label">Moneda:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="currency" name="currency"
                                    value="{{  Config::get('madecms.currency') }}" placeholder="MXN">
                                @error('currency')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefono:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{  Config::get('madecms.phone') }}" placeholder="7778589854">
                                @error('phone')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="map" class="form-label">Ubicaciones:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="map" name="map"
                                    value="{{  Config::get('madecms.map') }}" placeholder="92.3854785478">
                                @error('map')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="maitenance" class="form-label">Modo mantenimiento:</label>
                            <div class="input-group">
                                <select name="maitenance" id="maitenance" class="form-select">
                                    <option value="true" {{ Config::get('madecms.maitenance') == 'true' ? 'selected' : '' }}>Mantenimiento</option>
                                    <option value="false" {{ Config::get('madecms.maitenance') == 'false' ? 'selected' : '' }}>Publico</option>
                                </select>
                                @error('maintenance')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="products_per_page" class="form-label">Productos por pagina:</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-keyboard"></i>
                                </div>
                                <input type="text" class="form-control" id="products_per_page" name="products_per_page"
                                    value="{{  Config::get('madecms.products_per_page') }}" placeholder="10">
                                @error('products_per_page')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Enviar" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
@endsection

