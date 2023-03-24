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
                            <h4 class="card-title ">Inasistencias: {{$cantidad}}</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive ">
                                
                                <table class="table col-md-12 ">
                                    <thead >
                                        <th>Nombre</th>
                                        <th>Correo electronico</th>
                                        <th>Puesto</th>
                                        <th>foto</th>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @foreach ($registros as $item)
                                            <tr>
                                                <td>{{$item->nombre}} {{$item->appA}}</td> 
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->puesto->nombre}}</td>
                                                <td>{{$item->foto}}</td>
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