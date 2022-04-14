@extends('admin.master')

@section('title','Dashboard')

@section('content')
<div class="container-fluid">
    <div class="panel shadow mb-5">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-chart-column"></i> Estadisticas</h2>
        </div>

        <div class="inside">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officiis iure eveniet ratione ullam consequatur, soluta, itaque porro blanditiis assumenda facilis earum omnis magnam eos eius cum dolor. Repellendus, unde.
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="titlte"><i class="fa-solid fa-users"></i> Usuarios registrados</h2>
                </div>
                <div class="inside">
                    <div class="big_count text-center fs-1">
                        {{ $users }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="titlte"><i class="fa-solid fa-boxes-stacked"></i> Productos registrados</h2>
                </div>
                <div class="inside">
                    <div class="big_count text-center fs-1">
                        {{ $products }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="titlte"><i class="fa-solid fa-basket-shopping"></i> Ordenes hoy</h2>
                </div>
                <div class="inside">
                    <div class="big_count text-center fs-1">
                        0
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="titlte"><i class="fa-solid fa-money-check-dollar"></i> Facturado hoy</h2>
                </div>
                <div class="inside">
                    <div class="big_count text-center fs-1">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
