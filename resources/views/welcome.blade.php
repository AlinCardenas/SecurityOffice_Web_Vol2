@extends('layouts.plantilla')

@section('title', 'Asistencias')

@section('content')
    <body>
        <div class="content d-flex justify-content-center mx-5">
            <div class="card w-100">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Asistencias: {{$cantidad}}</h4>
                            </div>
    
                            <div class="card-body">
                                <div class="table-responsive ">
                                    
                                    <table class="table col-md-12 ">
                                        <thead >
                                            <th>Entrada</th>
                                            <th>Salida</th>
                                            <th>Usuario</th>                                            
                                            <th>Foto del usuario</th>                                            
                                        </thead>
                                        <tbody>
                                            @foreach ($registros as $item)
                                            <tr>
                                                <td>{{$item->entrada}}</td> 
                                                <td>{{$item->salida}}</td> 
                                                <td>{{$item->user->nombre}} {{$item->user->appA}}</td> 
                                                <td>{{$item->user->foto}}</td> 
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>

@endsection