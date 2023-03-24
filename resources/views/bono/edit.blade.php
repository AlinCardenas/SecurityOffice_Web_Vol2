@extends('layouts.plantilla')

@section('title', 'Actualizar bono')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                    <div class="card-body">
                        <form method="POST" action="{{ route('bonos.update', $bono->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="d-flex justify-content-center mb-4 mt-4">
                                <div class="card w-75">
                                    <div class="card-header">
                                        <h1 class="card-title">Actualizar bono</h1>
                                    </div>
                                    @include('bono.form')
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </section>
@endsection
