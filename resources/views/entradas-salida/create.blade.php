@extends('layouts.plantilla')

@section('title', 'Creacion de entrada')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')

            <form method="POST" action="{{ route('entradas.store') }}"  role="form" enctype="multipart/form-data">
                @csrf

                @include('entradas-salida.form')

            </form>
        </div>
    </div>
</section>
@endsection
