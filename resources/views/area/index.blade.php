
@extends('layouts.plantilla')

@section('title', 'Listado de usuarios')

@section('content')
<div class="content d-flex justify-content-center mx-5">
    <div class="card w-100 ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de área</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="mb-3">
                                <a class="btn text-white btn-create" href="{{route('areas.create')}}" role="button">Agregar área</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Estatus</th>
                                                <th>Sucursal</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                                </tr>
                                        </thead>
                                        <tbody id="loadsite">
                                            @foreach ($areas as $area)
                                            @if (isset($area['nombre']))
                                                <tr>                                                    
                                                    <td>{{ $area->nombre }}</td>
                                                    <td>{{ $area->estatus }}</td>
                                                    <td>{{ $area->sucursal->nombre }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                        href="{{ route('areas.edit',$area->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i>Editar</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('areas.destroy',$area->id) }}" method="POST">
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
                        {!! $areas->links() !!}
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
              $('#loadsite').load('ver_areas?mensaje=' + mensaje);
            }
        });
        const input = document.getElementById('ingreso');
        input.addEventListener('input', () => {
          if (input.value.trim().length === 0 || input.value.trim().length === 1) {
            console.log('El input está vacío');
            $('#loadsite').load('ver_areas_normal');
          }
        });
    });
</script>
@endsection
