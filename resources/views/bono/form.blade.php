
<div class="card-body">
    <label for="nombre" class="form-label">Nombre: </label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="basic-addon3" placeholder="Ingresa el nombre del bono:" value="{{$bono->nombre}}">
    </div>
    <div class="form-group mb-4">
        {{ Form::label('Monto del bono $') }}
        {{ Form::text('cantidad', $bono->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa cantidad del bono']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <label for="tipo" class=" form-label">Elige el rol del puesto: </label>
    <select class="form-select" aria-label="Default select example" name="tipo" id="tipo">
        <option value="">Selecciona el rol para puesto:</option>
        <option <?php if(old('tipo', $bono->tipo)=='Semanal') {echo("selected");} ?> value="1">Semanal</option>
        <option <?php if(old('tipo', $bono->tipo)=='Quincenal') {echo("selected");} ?> value="2">Quincenal</option>
        <option <?php if(old('tipo', $bono->tipo)=='Mensual') {echo("selected");} ?> value="3">Mensual</option>
        <option <?php if(old('tipo', $bono->tipo)=='Bimestral') {echo("selected");} ?> value="4">Bimestral</option>
        <option <?php if(old('tipo', $bono->tipo)=='Trimestral') {echo("selected");} ?> value="5">Trimestral</option>
        <option <?php if(old('tipo', $bono->tipo)=='Cuatrimestral') {echo("selected");} ?> value="6">Cuatrimestral</option>
        <option <?php if(old('tipo', $bono->tipo)=='Semestral') {echo("selected");} ?> value="7">Semestral</option>
        <option <?php if(old('tipo', $bono->tipo)=='Anual') {echo("selected");} ?> value="8">Anual</option>
        <option <?php if(old('tipo', $bono->tipo)=='Especial') {echo("selected");} ?> value="9">Especial</option>
    </select><br>
    <div class="form-group mb-4">
        {{ Form::label('Descripción') }}
        {{ Form::textarea('descripcion', $bono->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa la descripcion del bono']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    
</div>
<div class="d-flex justify-content-center my-4">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>