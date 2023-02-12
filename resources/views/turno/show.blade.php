@extends('layouts.app')

@section('template_title')
    {{ $turno->name ?? 'Show Turno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Turno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('turnos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Turno:</strong>
                            {{ $turno->turno }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio:</strong>
                            {{ $turno->hora_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Fin:</strong>
                            {{ $turno->hora_fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
