@extends('layouts.plantilla')

@section('title', 'Crear puesto')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('puesto.form')

                        </form>
            </div>
        </div>
    </section>
@endsection
