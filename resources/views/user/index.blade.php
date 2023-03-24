@extends('layouts.plantilla')

@section('title', 'Listado de usuarios')

@section('content')
<div class="content d-flex justify-content-center ms-4">
    <div class="card w-100 ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de usuarios</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="mb-3">
                                <a class="btn text-white btn-create" href="{{route('users.create')}}" role="button">Agregar usuario</a>
                            </div>
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
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr class="align-middle">
                                                <td >
                                                        {{ $user->nombre }}
                                                </td>
                                                <td class="">{{ $user->appA }}</td>
                                                <td class="">{{ $user->genero }}</td>
                                                <td  >
                                                    <div class="d-flex justify-content-center">
                                                        <img class="border border-2 rounded-circle me-2 ms-2" src="/imgs/{{$user->foto}}" width="70" alt="Logo del anime"></td>
                                                    </div>    
                                                <td >{{ $user->email }}</td>
                                                <td >{{ $user->estatus }}</td>
                                                <td >{{ $user->puesto->nombre }}</td>

                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                    href="{{ route('users.edit',$user->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i>Editar</a>
                                                    
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
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
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
