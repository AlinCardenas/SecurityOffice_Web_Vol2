
<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h1 class="card-title">Crear usuario</h1>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('tipo:') }}
                    {{ Form::text('tipo', $tiposBono->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
        </div>
    </div>
</div>


