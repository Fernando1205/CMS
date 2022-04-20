@extends('master')

@section('title','Producto')

@section('content')
    <div class="product_single">
        <div class="container">
            <div class="panel shadow mt-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="slick">
                            <div>
                                <img src="{{ asset('storage/t_'.$product->image) }}" class="img-fluid">
                            </div>
                            @if (count($gallery) > 0)
                                @foreach ($gallery as $img)
                                    <div>
                                        <img src="{{ asset('storage/t_'.$img->image) }}" class="img-fluid">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $product->name }}</h2>
                        <div class="category">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item"><a href=""><i class="fa-solid fa-house"></i> Inicio</a></li>
                                <li class="list-group-item"><a href=""><i class="fa-solid fa-shop"></i> Tienda</a></li>
                                <li class="list-group-item"><a href="">{!!  htmlspecialchars_decode($product->category->icono) !!} {{ $product->category->name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
$(document).ready(function(){
    $('.slick').slick({
        autoplay: true,
        autoplaySpeed: 2000,
    });
  });
</script>
@endpush
@push('css')
    <style>
        a {
            text-decoration: none!important;
        }
    </style>
@endpush
