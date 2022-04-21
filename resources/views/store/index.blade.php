@extends('master')

@section('title','Tienda')

@section('content')
    <div class="container">
        <div class="home_action_bar">
            <div class="panel shadow mt-5 p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dropdown mb-2">
                            <a class="btn btn-secondary dropdown-toggle d-block" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bars-staggered"></i> Categorias
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($categories as $cat)
                                    <li>
                                        <a class="dropdown-item" href="#">{!! html_entity_decode($cat->icono) !!} {{ $cat->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

