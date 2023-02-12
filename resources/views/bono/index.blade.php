@extends('layouts.plantilla')

@section('title', 'Listado de bonos')

@section('content')
<div class="content d-flex justify-content-center">
    <div class="card w-75">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de bonos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <div class="mb-3">
                                <a class="btn btn-info" href="{{route('bonos.create')}}" role="button">Agregar bono</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Cantidad</th>
                                                <th>Descripcion</th>
                                                <th>Tipo de bono</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bonos as $bono)
                                            <tr>
                                                <td>{{ $bono->cantidad }}</td>
                                                <td>{{ $bono->descripcion }}</td>
                                                <td>{{ $bono->tipoBonos_id }}</td>

                                                <td>
                                                    <form action="{{ route('bonos.destroy',$bono->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('bonos.show',$bono->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('bonos.edit',$bono->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
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
        @endsection
