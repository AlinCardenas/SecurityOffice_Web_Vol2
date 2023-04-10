@extends('layouts.plantilla')

@section('title', 'Inasistencias')
    
@section('content')
<body>
    
    <div class="content d-flex justify-content-center mx-5">
        <div class="card w-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Inasistencias: #{{$cantidad}}</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive ">
                                
                                <table class="table col-md-12 ">
                                    <thead >
                                        <th>Nombre</th>
                                        <th>Correo electronico</th>
                                        <th>Puesto</th>
                                        <th>Foto</th>
                                        <th>Solicitar justificación</th>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @foreach ($registros as $item)
                                            <p hidden>{{$cadena = str_replace('public/box/', '', $item->foto)}}</p> 
                                            <tr>
                                                <td>{{$item->nombre}} {{$item->appA}}</td> 
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->puesto->nombre}}</td>
                                                <td style="text-align:center;">
                                                    <div>
                                                        <div class="d-flex justify-content-center">
                                                            <img class="border border-2 rounded-circle me-2 ms-2" src="storage/box/{{$cadena}}" width="70" alt="Logo del anime"></td>
                                                        </div>  
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('faltas.enviar', $item->id)}}" class="btn btn-dark">Enviar</a>
                                                </td>
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