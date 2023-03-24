@extends('layouts.plantilla')

@section('title', 'Actualizar turno')

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card-body">
                <form method="POST" action="{{ route('turnos.update', $turno->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Actualizar turno</h1>
                            </div>
                            @include('turno.form')
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>
@endsection
