@extends('layouts.app')

@section('template_title')
    {{ $tiposBono->name ?? 'Show Tipos Bono' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipos Bono</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipos-bonos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $tiposBono->tipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
