@extends('layouts.plantilla')

@section('title', 'Crear bono')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')

            <form method="POST" action="{{ route('bonos.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                @include('bono.form')
            </form>
        </div>
    </div>
</section>
@endsection
