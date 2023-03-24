''
@extends('layouts.plantilla')

@section('title', 'Actualizar usuario')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card-body">
                <form method="POST" action="{{ route('tipos-bonos.update', $tiposBono) }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Actualizar usuario</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('tipo:') }}
                                    {{ Form::text('tipo', $tiposBono->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                                    {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
            
            </form>
        </div>
    </div>
</section>
@endsection
