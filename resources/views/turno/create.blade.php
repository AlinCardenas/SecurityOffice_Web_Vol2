@extends('layouts.plantilla')

@section('title', 'Crear turno')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <form method="POST" action="{{ route('turnos.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                @include('turno.form')
            </form>
        </div>
    </div>
</section>
@endsection
