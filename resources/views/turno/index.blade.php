@extends('layouts.plantilla')

@section('title', 'Listado de turnos')

@section('content')
<div class="content d-flex justify-content-center ms-4">
    <div class="card w-100 ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de turnos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="row mt-1 w-100 my-4">
                                <div class="col">
                                    <a class="btn btn-info" href="{{route('turnos.create')}}" role="button">Agregar turno</a>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Busca por nombre:</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="ingreso" name="ingreso">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Turno</th>
                                                <th>Hora de inicio</th>
                                                <th>Hora de fin</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="loadsite">
                                            @foreach ($turnos as $turno)
                                            @if (isset($turno['turno']))
                                                <tr>                                          
                                                    <td>{{ $turno->turno }}</td>
                                                    <td>{{ $turno->hora_inicio }}</td>
                                                    <td>{{ $turno->hora_fin }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                        href="{{ route('turnos.edit',$turno->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i>Editar</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('turnos.destroy',$turno->id) }}" method="POST">
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
                        {!! $turnos->links() !!}
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
              $('#loadsite').load('ver_turnos?mensaje=' + mensaje);
            }
        });
        const input = document.getElementById('ingreso');
        input.addEventListener('input', () => {
          if (input.value.trim().length === 0 || input.value.trim().length === 1) {
            console.log('El input está vacío');
            $('#loadsite').load('ver_turnos_normal');
          }
        });
    });
</script>
@endsection

