@extends('layouts.app')

@section('template_title')
    {{ $puestosTurno->name ?? 'Show Puestos Turno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Puestos Turno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puestos-turnos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Puesto Id:</strong>
                            {{ $puestosTurno->puesto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Turno Id:</strong>
                            {{ $puestosTurno->turno_id }}
                        </div>
                        <div class="form-group">
                            <strong>Lapso:</strong>
                            {{ $puestosTurno->lapso }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaingreso:</strong>
                            {{ $puestosTurno->fechaIngreso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
