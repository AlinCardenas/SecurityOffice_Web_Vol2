@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Appa:</strong>
                            {{ $user->appA }}
                        </div>
                        <div class="form-group">
                            <strong>Appb:</strong>
                            {{ $user->appB }}
                        </div>
                        <div class="form-group">
                            <strong>Fechan:</strong>
                            {{ $user->fechaN }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $user->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $user->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $user->estatus }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto Id:</strong>
                            {{ $user->puesto_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
