@extends('layouts.plantilla')

@section('title', 'Bonos')

@section('content')
<body>
    <div class="d-flex justify-content-center mb-5 mt-5">
        <div class="card w-50  ">
            <div class="card-header">
                <h4 class="card-title">Editar bono</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="">
                        <div class="mb-3">
                            <label class="form-label" size="3" for="id_bono">Bono</label><br>
                            <select class="form-select form-control " aria-label="Default select example">
                                <option selected>Selecciona nombre del bono</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="monto">Monto del bono</label><br />
                            <input class="form-control" type="double" name="monto" maxlength="10"
                                placeholder="Ingresa cantidad del bono" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="appB">Descripción</label><br />
                            <textarea class="form-control" type="description" cols="30" rows="10" name="monto"
                                placeholder="Ingresa la descripcion del bono" required></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    
@endsection