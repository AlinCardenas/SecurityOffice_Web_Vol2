@extends('layouts.plantilla')

@section('title', 'Listado de usuarios')

@section('content')
    <div class="container-fluid w-75">
        <h1>Listado de usuarios</h1>
        <div class="row"> 
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                             <div class="float-right my-2">
                                <a href="{{ route('users.create') }}" class="btn btn-info btn-sm float-right"  data-placement="right">
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
										<th>Primer apellido</th>
										<th>Genero</th>
										<th>Foto</th>
										<th>Email</th>
										<th>Estatus</th>
										<th>Puesto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>                                            
											<td>{{ $user->nombre }}</td>
											<td>{{ $user->appA }}</td>
											<td>{{ $user->genero }}</td>
											<td>{{ $user->foto }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->estatus }}</td>
											<td>{{ $user->puesto_id }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
