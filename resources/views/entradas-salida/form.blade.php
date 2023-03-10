<div class="box box-info padding-1">
    <div class="box-body">
        
        

    </div>

</div>







<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h1 class="card-title">Crear registro de entrada</h1>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('entrada:') }}
                    <input type="time" name="entrada" id="entrada" class="form-control">
                </div><br>
                <div class="form-group">
                    {{ Form::label('salida:') }}
                    <input type="time" name="salida" id="salida" class="form-control">
                </div><br>
                <div class="form-group">
                    <label>Selecciona al usuario:</label>
                    {{ Form::select('usuario_id', $registro, $entradasSalida->usuario_id, ['class' => 'form-control' . ($errors->has('usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de usuario']) }}
                    {!! $errors->first('usuario_id', '<div class="invalid-feedback">:message</div>') !!}
                </div><br>
                <div class="form-group">
                    {{ Form::label('bono') }}
                    {{ Form::select('bono_id', $registrob, $entradasSalida->bono_id, ['class' => 'form-control' . ($errors->has('bono_id') ? ' is-invalid' : ''), 'placeholder' => 'Bono Id']) }}
                    {!! $errors->first('bono_id', '<div class="invalid-feedback">:message</div>') !!}
                </div><br>
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

