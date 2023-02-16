
<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h1 class="card-title">Crear usuario</h1>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="basic-addon3" placeholder="Ingresa el nombre:" required>
                  </div>
                  <label for="appA" class="form-label">Ingresa el primer apellido: </label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="appA" id="appA" aria-describedby="basic-addon3" placeholder="Ingresa el primer apellido:" required>
                  </div>
                  <label for="appB" class="form-label">Ingresa el primer apellido: </label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="appB" id="appB" aria-describedby="basic-addon3" placeholder="Ingresa el segundo apellido:" required>
                  </div>
      
                  <label for="fechaN" class="form-label">Ingresa la fecha de nacimiento: </label>
                  <div class="input-group mb-3">
                    <input type="date" class="form-control" name="fechaN" id="fechaN" aria-describedby="basic-addon3" required>
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
                        <div class="dropzone ">
                            <img src="{{asset('/img/subir.png')}}" width="150" height="150" class="upload-icon" />
                            <input type="file" class="form-control upload-input" id="foto" name="foto" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-4 mt-3">
                        <button type="button" class="btn btn-outline-dark">Sube una imagen jpeg, jpg o png</button>
                    </div>

                    {{--  --}}
                    <label for="email" class="form-label">Correo electronico: </label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="email" id="email" aria-describedby="basic-addon3" placeholder="Ingresa el correo electronico:" required>
                    </div>
                    <label for="password" class="form-label">Contraseña: </label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon3" placeholder="Ingresa la contraseña:" required>
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
        </div>
    </div>
</div>
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




{{-- <div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $user->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre: ']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Primer apellido') }}
            {{ Form::text('appA', $user->appA, ['class' => 'form-control' . ($errors->has('appA') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa tu primer apellido']) }}
            {!! $errors->first('appA', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Segundo apellido') }}
            {{ Form::text('appB', $user->appB, ['class' => 'form-control' . ($errors->has('appB') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa tu segundo apellido']) }}
            {!! $errors->first('appB', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de nacimiento') }}
            {{ Form::date('fechaN', $user->fechaN, ['class' => 'form-control' . ($errors->has('fechaN') ? ' is-invalid' : ''), 'placeholder' => 'Fechan']) }}
            {!! $errors->first('fechaN', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mt-3">
            <label for="genero">Género</label><br>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="genero" />Femenino<br />
                <input class="form-check-input" type="radio" name="genero" />Masculino<br />
            </div>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto de perfil</label>
            <input class="form-control" type="file" id="foto" name="foto" required>
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Contraseña</label><br />
            <input class="form-control" type="password" name="password" placeholder="Ingresa contraseña" required />
        </div>
        <div class="form-group">
            {{ Form::label('puesto_id') }}
            {{ Form::text('puesto_id', $user->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto Id']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div> --}}