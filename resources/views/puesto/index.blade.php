@extends('layouts.plantilla')

@section('title', 'Puestos')

@section('content')
    <div class="container-fluid w-75">
        <h1>Listado de puestos</h1>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right my-2">
                                <a href="{{ route('puestos.create') }}" class="btn btn-info btn-sm float-right"  data-placement="right">
                                  {{ __('Crear nuevo usuario') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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
											<td>{{ $puesto->area_id }}</td>

                                            <td>
                                                <form action="{{ route('puestos.destroy',$puesto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('puestos.show',$puesto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('puestos.edit',$puesto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
@endsection
