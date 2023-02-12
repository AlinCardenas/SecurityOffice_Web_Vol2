@extends('layouts.app')

@section('template_title')
    {{ $puesto->name ?? 'Show Puesto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Puesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puestos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $puesto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Salario:</strong>
                            {{ $puesto->salario }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $puesto->estatus }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $puesto->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Area Id:</strong>
                            {{ $puesto->area_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
