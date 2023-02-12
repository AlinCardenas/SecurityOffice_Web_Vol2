
<div class="d-flex justify-content-center mb-4 mt-4">
    <div class="card w-75">
        <div class="card-header">
            <h4 class="card-title">Ingresa tus datos</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $user->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre: ']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Primer apellido') }}
                {{ Form::text('appA', $user->appA, ['class' => 'form-control' . ($errors->has('appA') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa tu primer apellido']) }}
                {!! $errors->first('appA', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Segundo apellido') }}
                {{ Form::text('appB', $user->appB, ['class' => 'form-control' . ($errors->has('appB') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa tu segundo apellido']) }}
                {!! $errors->first('appB', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Fecha de nacimiento') }}
                {{ Form::date('fechaN', $user->fechaN, ['class' => 'form-control' . ($errors->has('fechaN') ? ' is-invalid' : ''), 'placeholder' => 'Fechan']) }}
                {!! $errors->first('fechaN', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="mt-3">
                <label for="genero">Género</label><br>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="genero" />Femenino<br />
                    <input class="form-check-input" type="radio" name="genero" />Masculino<br />
                </div>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto de perfil</label>
                <input class="form-control" type="file" id="foto" name="foto" required>
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Contraseña</label><br />
                <input class="form-control" type="password" name="password" placeholder="Ingresa contraseña" required />
            </div>
            <div class="form-group">
                {{ Form::label('puesto_id') }}
                {{ Form::text('puesto_id', $user->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto Id']) }}
                {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>




{{-- <div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $user->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre: ']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Primer apellido') }}
            {{ Form::text('appA', $user->appA, ['class' => 'form-control' . ($errors->has('appA') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa tu primer apellido']) }}
            {!! $errors->first('appA', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Segundo apellido') }}
            {{ Form::text('appB', $user->appB, ['class' => 'form-control' . ($errors->has('appB') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa tu segundo apellido']) }}
            {!! $errors->first('appB', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de nacimiento') }}
            {{ Form::date('fechaN', $user->fechaN, ['class' => 'form-control' . ($errors->has('fechaN') ? ' is-invalid' : ''), 'placeholder' => 'Fechan']) }}
            {!! $errors->first('fechaN', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mt-3">
            <label for="genero">Género</label><br>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" name="genero" />Femenino<br />
                <input class="form-check-input" type="radio" name="genero" />Masculino<br />
            </div>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto de perfil</label>
            <input class="form-control" type="file" id="foto" name="foto" required>
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Contraseña</label><br />
            <input class="form-control" type="password" name="password" placeholder="Ingresa contraseña" required />
        </div>
        <div class="form-group">
            {{ Form::label('puesto_id') }}
            {{ Form::text('puesto_id', $user->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto Id']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div> --}}