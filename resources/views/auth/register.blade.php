<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <form method="POST" action="{{ route('registerVerify.store') }}" role="form" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-center mb-4 mt-4">
        <div class="card w-50">
            <div class="card-header">
                <h1 class="card-title">Registro</h1>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="basic-addon3" placeholder="Ingresa el nombre:"  value="{{old('nombre')}}" required>
                      </div>
                      <label for="appA" class="form-label">Ingresa el primer apellido: </label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="appA" id="appA" aria-describedby="basic-addon3" placeholder="Ingresa el primer apellido:" value="{{old('appA')}}" required>
                      </div>
                      <label for="appB" class="form-label">Ingresa el primer apellido: </label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="appB" id="appB" aria-describedby="basic-addon3" placeholder="Ingresa el segundo apellido:" value="{{old('appB')}}" required>
                      </div>
          
                      <label for="fechaN" class="form-label">Ingresa la fecha de nacimiento: </label>
                      <div class="input-group mb-3">
                        <input type="date" class="form-control" name="fechaN" id="fechaN" aria-describedby="basic-addon3" value="{{old('fechaN')}}" required>
                      </div>    
                      <div class="mt-3">
                          <label for="genero" class="form-label">Género</label><br>
                          <div class="form-check mb-3">
                              <input class="form-check-input" type="radio" name="genero" value="Femenino"/>Femenino<br />
                              <input class="form-check-input" type="radio" name="genero" value="Masculino"/>Masculino<br />
                          </div>
                      </div>
                      {{--  --}}
    
                      <div id="element" style="display:none;">
                        <div class="d-flex justify-content-center mt-4">
                                <img id="imgSelect" alt="img" class="w-25 h-25 border border-4 border-dark rounded-circle">
                            </div>
                        </div>
    
                        <div class="d-flex justify-content-center mt-4">
                            <div class="dropzone">
                                <input type="file" class="form-control upload-input" id="foto" name="foto"  required>
                            </div>
                        </div>

    
                        {{--  --}}
                        <label for="email" class="form-label">Correo electronico: </label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="email" id="email" aria-describedby="basic-addon3" placeholder="Ingresa el correo electronico:" value="{{old('email')}}" required>
                        </div>
                        <label for="password" class="form-label">Contraseña: </label>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon3" placeholder="Ingresa la contraseña:" value="{{old('password')}}" required>
                        </div>
                        <div class="form-group mb-4">
                            {{ Form::label('Puesto') }}
                            {{ Form::select('puesto_id', $registro, $user->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el puesto']) }}
                            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                      <a href="{{route('login')}}" class="link-info">Iniciar sesion</a>
                  </div>
            </div>
        </div>
    </div>
    </form>
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
</body>
</html>