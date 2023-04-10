@extends('layouts.plantilla')

@section('title', 'Puestos')

@section('content')

<div class="content d-flex justify-content-center ms-4">
    <div class="card w-100 ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de puestos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="mb-3">
                                <a class="btn text-white btn-info" href="{{route('puestos.create')}}" role="button">Agregar puesto</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>                                        
                                                <th>Nombre</th>
                                                <th>Salario</th>
                                                <th>Estatus</th>
                                                <th>Rol de puesto</th>
                                                <th>Area</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($puestos as $puesto)
                                                <tr>
                                                    <td>{{ $puesto->nombre }}</td>
                                                    <td>{{ $puesto->salario }}</td>
                                                    <td>{{ $puesto->estatus }}</td>
                                                    <td>{{ $puesto->rol }}</td>
                                                    <td>{{ $puesto->area->nombre }}</td>
        
                                                    <td>
                                                        <form action="{{ route('puestos.destroy',$puesto->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-primary" href="{{ route('puestos.edit',$puesto->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Borrar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $puestos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

