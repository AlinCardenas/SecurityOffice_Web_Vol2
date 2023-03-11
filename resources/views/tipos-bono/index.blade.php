@extends('layouts.plantilla')

@section('title', 'Listado de tipos de bonos')

@section('content')
<div class="content d-flex justify-content-center ms-4">
    <div class="card w-100 ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de tipos de bonos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="mb-3">
                                <a class="btn text-white btn-create" href="{{route('tipos-bonos.create')}}" role="button">Agregar registro</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Tipo</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tiposBonos as $tiposBono)
                                                <tr>                                                    
                                                    <td>{{ $tiposBono->tipo }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="{{ route('tipos-bonos.edit',$tiposBono->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('tipos-bonos.destroy',$tiposBono->id) }}" method="POST">
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
                        {!! $tiposBonos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
