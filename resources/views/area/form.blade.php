

<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h1 class="card-title">Crear Area</h1>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>            
                <label for="nombre" class="mt-4 form-label">Estatus: </label>
                <select class="form-select" aria-label="Default select example" name="estatus">
                    <option value="" >Selecciona un estatus para el area</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select><br>
                <div class="form-group mb-4">
                    {{ Form::label('Sucursal') }}
                    {{ Form::select('sucursal_id', $registro, $area->sucursal_id, ['class' => 'form-control' . ($errors->has('sucursal_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la sucursal']) }}
                    {!! $errors->first('sucursal_id', '<div class="invalid-feedback">:message</div>') !!}
                </div> 
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>



