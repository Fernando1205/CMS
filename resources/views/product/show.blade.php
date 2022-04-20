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
                        {{ $product->name }}
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
