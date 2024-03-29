

@extends('layouts.plantilla')

@section('title', 'Actualizar usuario')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card-body">
                <form method="POST" action="{{ route('entradas.update', $id) }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Actualizar registro de entrada</h1>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('entrada:') }}
                                    <input type="time" name="entrada" id="entrada" class="form-control" value="{{$id->entrada}}">
                                </div><br>
                                <div class="form-group">
                                    {{ Form::label('salida:') }}
                                    <input type="time" name="salida" id="salida" class="form-control" value="{{$id->salida}}">
                                </div><br>
                                <div class="form-group">
                                    <label for="">Fecha:</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{$id->fecha}}">
                                </div><br>
                                <div class="form-group">
                                    <label>Selecciona al usuario:</label>
                                    {{ Form::select('usuario_id', $registro, $id->usuario_id, ['class' => 'form-control' . ($errors->has('usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de usuario']) }}
                                    {!! $errors->first('usuario_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div><br>
                                <div class="form-group">
                                    {{ Form::label('bono') }}
                                    {{ Form::select('bono_id', $registrob, $id->bono_id, ['class' => 'form-control' . ($errors->has('bono_id') ? ' is-invalid' : ''), 'placeholder' => 'Bono Id']) }}
                                    {!! $errors->first('bono_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div><br>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection
