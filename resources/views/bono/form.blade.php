<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h1 class="card-title">Crear bono</h1>
        </div>
        
        <div class="card-body">
            <div class="form-group mb-4">
                {{ Form::label('bono') }}
                {{ Form::text('tipoBonos_id', $bono->tipoBonos_id, ['class' => 'form-control' . ($errors->has('tipoBonos_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona nombre del bono']) }}
                {!! $errors->first('tipoBonos_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group mb-4">
                {{ Form::label('Monto del bono') }}
                {{ Form::text('cantidad', $bono->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa cantidad del bono']) }}
                {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group mb-4">
                {{ Form::label('Descripción') }}
                {{ Form::textarea('descripcion', $bono->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa la descripcion del bono']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
        </div>
        <div class="d-flex justify-content-center my-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</div>