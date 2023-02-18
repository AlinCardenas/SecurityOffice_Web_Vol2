<div class="card-body">
    <div class="form-group mb-4">
        {{ Form::label('turno') }}
        {{ Form::text('turno', $turno->turno, ['class' => 'form-control' . ($errors->has('turno') ? ' is-invalid' : ''), 'placeholder' => 'Turno']) }}
        {!! $errors->first('turno', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group mb-4">
        {{ Form::label('hora_inicio') }}
        {{ Form::time('hora_inicio', $turno->hora_inicio, ['class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Hora Inicio']) }}
        {!! $errors->first('hora_inicio', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group mb-4">
        {{ Form::label('hora_fin') }}
        {{ Form::time('hora_fin', $turno->hora_fin, ['class' => 'form-control' . ($errors->has('hora_fin') ? ' is-invalid' : ''), 'placeholder' => 'Hora Fin']) }}
        {!! $errors->first('hora_fin', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="d-flex justify-content-center my-4">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
