<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="{{ route('loginVerify.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-center mb-4 mt-4">
            <div class="card w-50">
                <div class="card-header">
                    <h1 class="card-title">Inicio de sesion</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        
                        @error('invalid_credentials')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <small>
                                    {{ $message }}
                                </small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                            
                            </div>
                            
                        @enderror

                        {{--  --}}

                        <label for="email" class="form-label">Correo electronico: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="email" id="email"
                                aria-describedby="basic-addon3" placeholder="Ingresa el correo electronico:"
                                value="{{old('email')}}" required>
                        </div>
                        <label for="password" class="form-label">Contraseña: </label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" id="password"
                                aria-describedby="basic-addon3" placeholder="Ingresa la contraseña:"
                                value="{{old('password')}}" required>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                        {{-- <div class="d-flex justify-content-center mt-4">
                            <a href="{{route('register')}}" class="link-info">Registrarme</a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
