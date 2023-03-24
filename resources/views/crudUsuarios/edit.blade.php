@extends('layouts.plantilla')

@section('title', 'Bonos')

@section('content')
<body>
    <div class="d-flex justify-content-center mb-4 mt-4">
        <div class="card w-50  ">
            <div class="card-header">
                <h4 class="card-title">Actializar datos</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="">
                        <div class="mb-3">
                            <label class="form-label" for="nombre">Nombre</label><br />
                            <input class="form-control" type="text" name="nombre" placeholder="Ingresa nombre" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="appA">Apellido paterno</label><br />
                            <input class="form-control" type="text" name="appA" placeholder="Ingresa apellido paterno" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="appB">Apellido materno</label><br />
                            <input class="form-control" type="text" name="appB" placeholder="Ingresa apellido materno" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="fechaN">Fecha de nacimiento</label><br />
                            <input class="form-control" type="date" name="fechaN" required />
                        </div>
                        <div>
                            <label for="genero" class=" ">Género</label><br>
                            <div class="form-check mb-3 mt-4">
                                <input class="form-check-input" type="radio" name="genero" />Femenino<br />
                                <input class="form-check-input" type="radio" name="genero" />Masculino<br />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fotoPerf" class="form-label">Foto de perfil</label>
                            <input class="form-control" type="file" id="formFile" name="fotoPerf" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label><br />
                            <input class="form-control" type="email" name="email" placeholder="Ingresa correo electronico" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="contrasena">Contraseña</label><br />
                            <input class="form-control" type="password" name="contrasena" placeholder="Ingresa contraseña" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" size="3" for="id_puesto">Puesto</label><br>
                            <select class="form-select form-control " aria-label="Default select example">
                                <optgroup label="Administrativo">
                                    <option selected>Selecciona tu puesto</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection