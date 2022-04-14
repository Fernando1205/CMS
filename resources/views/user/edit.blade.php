@extends('master')

@section('title','Editar perfil')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 d-flex mb-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fa-solid fa-image"></i> Editar avatar</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-3">
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
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefono:</label>
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{ $perfil->phone }}" placeholder="7771234567">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">Fecha de nacimiento:</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $perfil->birthday }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Disabled select menu</label>
                                        <select class="form-select">
                                            <option value="">--Seleccione--</option>
                                            <option value="0" {{ $perfil->gender == 1 ? 'selected' : '' }}>Sin especificar</option>
                                            <option value="1" {{ $perfil->gender == 1 ? 'selected' : '' }}>Hombre</option>
                                            <option value="2" {{ $perfil->gender == 2 ? 'selected' : '' }}>Mujer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Actualizar" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-key"></i> Cambiar contraseña</h5>
                        <hr>
                        <form action="{{ route('perfil.updatePass', $perfil) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña actual:</label>
                                        <input type="password" class="form-control" id="password" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">Nueva Contraseña:</label>
                                        <input type="password" class="form-control" id="newPassword" placeholder="********">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirmar Contraseña:</label>
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="********">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Actualizar" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection