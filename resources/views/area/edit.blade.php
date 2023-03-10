
@extends('layouts.plantilla')

@section('title', 'Actualizar usuario')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card-body">
                <form method="POST" action="{{ route('areas.update', $area) }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Actualizar area</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre: </label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$area->nombre}}">
                                </div>            
                                <label for="nombre" class="mt-4 form-label">Estatus: </label>
                                <select class="form-select" aria-label="Default select example" name="estatus">
                                    <option value="" >Selecciona un estatus para el area</option>
                                    <option <?php if(old('estatus', $area->estatus)==1){echo("selected");} ?> value="1">Activo</option>
                                    <option <?php if(old('estatus', $area->estatus)==0){echo("selected");} ?>  value="0">Inactivo</option>
                                </select> 
                                {{--  --}}
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</section>

@endsection
