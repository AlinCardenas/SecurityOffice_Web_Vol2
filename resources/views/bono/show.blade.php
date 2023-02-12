@extends('layouts.app')

@section('template_title')
    {{ $bono->name ?? 'Show Bono' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bono</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bonos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $bono->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $bono->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipobonos Id:</strong>
                            {{ $bono->tipoBonos_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
