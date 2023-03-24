@extends('layouts.plantilla')

@section('title', 'Creacion de usuario')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')

            <form method="POST" action="{{ route('areas.store') }}"  role="form" enctype="multipart/form-data">
                @csrf

                @include('area.form')

            </form>
        </div>
    </div>
</section>
@endsection
