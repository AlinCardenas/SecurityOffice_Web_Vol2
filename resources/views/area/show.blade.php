@extends('layouts.app')

@section('template_title')
    {{ $area->name ?? 'Show Area' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Area</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('areas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $area->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $area->estatus }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
