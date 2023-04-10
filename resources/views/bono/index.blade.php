@extends('layouts.plantilla')

@section('title', 'Listado de bonos')

@section('content')
<div class="content d-flex justify-content-center mx-5">
    <div class="card w-100">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de bonos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="mb-3">
                                <a class="btn text-white btn-info" href="{{route('bonos.create')}}" role="button">Agregar bono</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Descripcion</th>
                                                <th>Tipo de bono</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="loadsite">
                                            @foreach ($bonos as $bono)
                                            @if (isset($bono['nombre']))
                                                <tr>
                                                    <td>{{ $bono->nombre }}</td>
                                                    <td>{{ $bono->cantidad }}</td>
                                                    <td>{{ $bono->descripcion }}</td>
                                                    <td>{{ $bono->tipo }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                        href="{{ route('bonos.edit',$bono->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i>Editar</a>

                                                    </td>
                                                    <td>
                                                        <form action="{{ route('bonos.destroy',$bono->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i>Borrar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $bonos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#ingreso').on('keyup', function(){
            let mensaje = document.getElementById("ingreso").value;
            console.log(mensaje);
            if(mensaje.length>=3){
              $('#loadsite').load('ver_bonos?mensaje=' + mensaje);
            }
        });
        const input = document.getElementById('ingreso');
        input.addEventListener('input', () => {
          if (input.value.trim().length === 0 || input.value.trim().length === 1) {
            console.log('El input está vacío');
            $('#loadsite').load('ver_bonos_normal');
          }
        });
    });
</script>
@endsection
