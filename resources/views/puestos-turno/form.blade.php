<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('puesto_id') }}
            {{ Form::text('puesto_id', $puestosTurno->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto Id']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('turno_id') }}
            {{ Form::text('turno_id', $puestosTurno->turno_id, ['class' => 'form-control' . ($errors->has('turno_id') ? ' is-invalid' : ''), 'placeholder' => 'Turno Id']) }}
            {!! $errors->first('turno_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lapso') }}
            {{ Form::text('lapso', $puestosTurno->lapso, ['class' => 'form-control' . ($errors->has('lapso') ? ' is-invalid' : ''), 'placeholder' => 'Lapso']) }}
            {!! $errors->first('lapso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaIngreso') }}
            {{ Form::text('fechaIngreso', $puestosTurno->fechaIngreso, ['class' => 'form-control' . ($errors->has('fechaIngreso') ? ' is-invalid' : ''), 'placeholder' => 'Fechaingreso']) }}
            {!! $errors->first('fechaIngreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>