@extends('layouts.app')

@section('template_title')
    {{ $entradasSalida->name ?? 'Show Entradas Salida' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Entradas Salida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('entradas-salidas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Entrada:</strong>
                            {{ $entradasSalida->entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Salida:</strong>
                            {{ $entradasSalida->salida }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Id:</strong>
                            {{ $entradasSalida->usuario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Bono Id:</strong>
                            {{ $entradasSalida->bono_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
