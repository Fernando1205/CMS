@extends('master')

@section('title','Carrito')

@section('content')
    <div class="container">
        @if (count($items) == 0)
        <div class="card text-center mt-5">
            <div class="card-header">
                No cuenta con articulos
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ Auth::user()->name }} no cuentas con items en tu carrito</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('store.index') }}" class="btn btn-primary">Ir a tienda</a>
            </div>
        </div>
        @else

        @endif

    </div>
@endsection
