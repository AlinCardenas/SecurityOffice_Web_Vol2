@extends('layouts.plantilla')

@section('title', 'Crear turno')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <form method="POST" action="{{ route('turnos.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Crear turno</h1>
                            </div>
                            @include('turno.form')
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection
