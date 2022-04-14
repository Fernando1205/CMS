@extends('master')

@section('title','Editar perfil')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fa-solid fa-image"></i> Editar avatar</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-user-pen"></i> Editar información</h5>
                        <hr>
                        <form action="{{ route('perfil.update', $perfil) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="name" placeholder="Fernando" value="{{ $perfil->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Apellidos:</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lopez" value="{{ $perfil->lastanme }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ $perfil->email }}" disabled>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fa-solid fa-key"></i> Cambiar contraseña</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
