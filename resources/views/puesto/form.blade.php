<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h4 class="card-title">Ingresa tus datos</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $puesto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el nombre del puesto']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('salario') }}
                {{ Form::number('salario', $puesto->salario, ['class' => 'form-control' . ($errors->has('salario') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el salario del puesto']) }}
                {!! $errors->first('salario', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('estatus') }}
                {{ Form::text('estatus', $puesto->estatus, ['class' => 'form-control' . ($errors->has('estatus') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el estatus del puesto']) }}
                {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('rol') }}
                {{ Form::text('rol', $puesto->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el rol del puesto']) }}
                {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Area') }}
                {{ Form::text('area_id', $puesto->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el area del puesto']) }}
                {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
    
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        </div>
    </div>
</div>