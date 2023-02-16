<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h1 class="card-title">Crear puesto</h4>
        </div>
        
        <div class="card-body">
            <label for="nombre" class="form-label">Nombre: </label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="basic-addon3" placeholder="Ingresa el nombre del puesto:" required>
            </div>

            <label for="salario" class="form-label">Salario: </label>
            <div class="input-group mb-3">
              <input type="number" class="form-control" name="salario" id="salario" aria-describedby="basic-addon3" placeholder="Ingresa la cantidad a otorgar por el bono:" required>
            </div>

            <label for="estatus" class=" form-label">Estatus: </label>
            <select class="form-select" aria-label="Default select example" name="estatus" id="estatus" required>
                <option value="" >Selecciona un estatus para puesto:</option>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>

            <label for="rol" class="mt-4 form-label">Elige el rol del puesto: </label>
            <select class="form-select" aria-label="Default select example" name="rol" id="rol" required>
                <option value="">Selecciona el rol para puesto:</option>
                <option value="Sin privilegios">Sin privilegios</option>
                <option value="Administrador">Administrador</option>
                <option value="Visualizador">Visualizador</option>
            </select>

            <div class="form-group mt-4">
                {{ Form::label('Area:') }}
                {{ Form::select('area_id', $registro ,$puesto->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el area del puesto']) }}
                {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
    
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        </div>
    </div>
</div>