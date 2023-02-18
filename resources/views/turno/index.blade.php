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
                            <div class="mb-3">
                                <a class="btn btn-info" href="{{route('turnos.create')}}" role="button">Agregar turno</a>
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
                                        <tbody>
                                            @foreach ($turnos as $turno)
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
@endsection

