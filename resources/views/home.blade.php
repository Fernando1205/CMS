@extends('master')

@section('title','Inicio')

@section('content')
    <div class="container">
        <div class="home_action_bar">
            <div class="panel shadow mt-5 p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dropdown">
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
                    <div class="col-md-9">
                        <form action="" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" class="form-control" placeholder="¿Buscas algo?">
                                <span class="input-group-text">BUSCAR</span>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
