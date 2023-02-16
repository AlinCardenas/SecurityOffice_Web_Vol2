@extends('layouts.plantilla')

@section('title', 'Actualizar usuario')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user) }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Actualizar usuario</h1>
                            </div>
                            <div class="card-body">
                                <label for="nombre" class="form-label">Ingresa el nombre: </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        aria-describedby="basic-addon3" placeholder="Ingresa el nombre:" value="{{$user->nombre}}" >
                                </div>
                                <label for="appA" class="form-label">Ingresa el primer apellido: </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="appA" id="appA"
                                        aria-describedby="basic-addon3" placeholder="Ingresa el primer apellido:"  value="{{$user->appA}}">
                                </div>
                                <label for="appB" class="form-label">Ingresa el primer apellido: </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="appB" id="appB"
                                        aria-describedby="basic-addon3" placeholder="Ingresa el segundo apellido:"  value="{{$user->appB}}">
                                </div>
                                <label for="fechaN" class="form-label">Ingresa la fecha de nacimiento: </label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="fechaN" id="fechaN"
                                        aria-describedby="basic-addon3" value="{{$user->fechaN}}">
                                </div>
                                <div class="mt-3">
                                    <label for="genero" class="form-label">Género</label><br>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="genero"
                                            value="Femenino" <?php if(old('genero', $user->genero)=='Femenino') {echo("checked");} ?>  />Femenino<br />
                                        <input class="form-check-input" type="radio" name="genero"
                                            value="Masculino" <?php if(old('genero', $user->genero)=='Masculino') {echo("checked");} ?> />Masculino<br />
                                    </div>
                                </div>
                                {{--  --}}
                                <div id="element" style="display:none;">
                                    <div class="d-flex justify-content-center mt-4">
                                        <img id="imgSelect" alt="img"
                                            class="w-25 h-25 border border-4 border-dark rounded-circle">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <div class="dropzone ">
                                        <img src="{{asset('/img/subir.png')}}" width="150" height="150"
                                            class="upload-icon" />
                                        <input type="file" class="form-control upload-input" id="foto" name="foto">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mb-4 mt-3">
                                    <button type="button" class="btn btn-outline-dark">Sube una imagen jpeg, jpg o
                                        png</button>
                                </div>
                                {{--  --}}
                                <label for="email" class="form-label">Correo electronico: </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="email" id="email"
                                        aria-describedby="basic-addon3" placeholder="Ingresa el correo electronico:" value="{{$user->email}}">
                                </div>

                                <label for="estatus" class="form-label">Seleccione el estatus: </label>
                                <select class="form-select" aria-label="Default select example" name="estatus" id="estatus">
                                    <option value="">Elige el estatus del usuario: </option>
                                    <option <?php if(old('estatus', $user->estatus)==='activo'){echo("selected");} ?> value="Activo">Activo</option>
                                    <option  <?php if(old('estatus', $user->estatus)==='inactivo'){echo("selected");} ?> value="Inactivo">Inactivo</option>
                                    <option  <?php if(old('estatus', $user->estatus)==='jubilado'){echo("selected");} ?> value="Jubilado">Jubilado</option>
                                </select>
                                <div class="form-group mt-3">
                                    {{ Form::label('Puesto') }}
                                    {{ Form::select('puesto_id', $registro, $user->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el puesto']) }}
                                    {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</section>
<script>
    const $foto = document.querySelector("#foto"),
    $imgSelect = document.querySelector("#imgSelect");
    // Escuchar cuando cambie
    $foto.addEventListener("change", () => {
      // Los archivos seleccionados, pueden ser muchos o uno
      const archivos = $foto.files;
      // Si no hay archivos salimos de la función y quitamos la imagen
      if (!archivos || !archivos.length) {
        $imgSelect.src = "";
        return;
      }
      // Ahora tomamos el primer archivo, el cual vamos a previsualizar
      const primerArchivo = archivos[0];
      // Lo convertimos a un objeto de tipo objectURL
      const objectURL = URL.createObjectURL(primerArchivo);
      // Y a la fuente de la imagen le ponemos el objectURL
      $imgSelect.src = objectURL;
      document.getElementById("element").style.display = "block";
    });
</script>

@endsection
