@extends('layouts.plantilla')

@section('title', 'Actualizar puesto')

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card-body">
                <form method="POST" action="{{ route('puestos.update', $puesto) }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <div class="card w-75">
                            <div class="card-header">
                                <h1 class="card-title">Actualizar puesto</h4>
                            </div>
                            <div class="card-body"> 
                                <label for="basic-nombre" class="form-label">Nombre: </label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="nombre" value="{{$puesto->nombre}}" id="nombre" aria-describedby="basic-addon3" placeholder="Ingresa el nombre del puesto:" required>
                                </div>
                    
                                <label for="salario" class="form-label">Salario: </label>
                                <div class="input-group mb-3">
                                  <input type="number" class="form-control" name="salario" id="salario" value="{{$puesto->salario}}" aria-describedby="basic-addon3" placeholder="Ingresa la cantidad a otorgar por el bono:" required>
                                </div>
                    
                                <label for="estatus" class=" form-label">Estatus: </label>
                                <select class="form-select" aria-label="Default select example" name="estatus" id="estatus" required>
                                    <option value="" >Selecciona un estatus para puesto:</option>
                                    <option <?php if(old('estatus', $puesto->estatus)=='activo') {echo("selected");} ?> value="activo">Activo</option>
                                    <option <?php if(old('estatus', $puesto->estatus)=='inactivo') {echo("selected");} ?> value="inactivo">Inactivo</option>
                                </select>
                    
                                <label for="rol" class="mt-4 form-label">Elige el rol del puesto: </label>
                                <select class="form-select" aria-label="Default select example" name="rol" id="rol" required>
                                    <option value="">Selecciona el rol para puesto:</option>
                                    <option <?php if(old('rol', $puesto->rol)=='administrador') {echo("selected");} ?> value="1">Administrador</option>
                                    <option <?php if(old('rol', $puesto->rol)=='gerente') {echo("selected");} ?> value="2">Gerente</option>
                                    <option <?php if(old('rol', $puesto->rol)=='usuario') {echo("selected");} ?> value="3">Usuario</option>
                                </select>
                    
                                <div class="form-group mt-4">
                                    {{ Form::label('Area:') }}
                                    {{ Form::select('area_id', $registro ,$puesto->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el area del puesto']) }}
                                    {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                        
                            </div>
                            <div class="d-flex justify-content-center my-3">
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


