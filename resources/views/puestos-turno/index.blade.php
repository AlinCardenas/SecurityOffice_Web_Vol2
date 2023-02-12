@extends('layouts.app')

@section('template_title')
    Puestos Turno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Puestos Turno') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('puestos-turnos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
										<th>Puesto Id</th>
										<th>Turno Id</th>
										<th>Lapso</th>
										<th>Fechaingreso</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puestosTurnos as $puestosTurno)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $puestosTurno->puesto_id }}</td>
											<td>{{ $puestosTurno->turno_id }}</td>
											<td>{{ $puestosTurno->lapso }}</td>
											<td>{{ $puestosTurno->fechaIngreso }}</td>

                                            <td>
                                                <form action="{{ route('puestos-turnos.destroy',$puestosTurno->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('puestos-turnos.show',$puestosTurno->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('puestos-turnos.edit',$puestosTurno->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $puestosTurnos->links() !!}
            </div>
        </div>
    </div>
@endsection
