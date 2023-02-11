@extends('layouts.plantilla')

@section('title', 'Bonos')

@section('content')
    <h1>Ver</h1>
    <body>
        <div class="content d-flex justify-content-center">
            <div class="card w-90">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Lista de bonos</h4>
                                
                            </div>
    
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-info">Agregar bono</button>
                                    </div>
                                    <table class="table col-md-12 ">
                                        <thead >
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Editar</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger">Borrar</button>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
