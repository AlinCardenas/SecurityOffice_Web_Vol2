@extends('layouts.plantilla')

@section('title', 'Asistencias')

@if (Auth::user()->puesto->rol=='administrador' || Auth::user()->puesto->rol=='gerente')
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
@elseif(Auth::user()->puesto->rol=='usuario')
    @section('content')
        <style>
            @import "https://code.highcharts.com/css/highcharts.css";
            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 1000px;
                margin: 1em auto;
            }
            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }
            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }
            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }
            .highcharts-yaxis .highcharts-axis-line {
                stroke-width: 2px;
            }
            /* Link the series colors to axis colors */
            .highcharts-color-0 {
                fill: #7cb5ec;
                stroke: #7cb5ec;
            }
            .highcharts-axis.highcharts-color-0 .highcharts-axis-line {
                stroke: #7cb5ec;
            }
            .highcharts-axis.highcharts-color-0 text {
                fill: #7cb5ec;
            }
            .highcharts-color-1 {
                fill: #90ed7d;
                stroke: #90ed7d;
            }
            .highcharts-axis.highcharts-color-1 .highcharts-axis-line {
                stroke: #90ed7d;
            }
            .highcharts-axis.highcharts-color-1 text {
                fill: #90ed7d;
            }
        </style>
        <h1>Mis asistencias</h1>
        <figure class="highcharts-figure">
            <div id="container">

            </div>
        </figure>

        <div>
            {{-- @dump($valores) --}}
            {{-- ? Aqui pondras la tabla tu xfas --}}
        </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script>
            Highcharts.chart('container', {
            
                chart: {
                    type: 'column',
                    styledMode: true
                },
            
                title: {
                    text: 'Registro historico de asistencias',
                    align: 'left'
                },
            
                xAxis: {
                    categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
                },
            
                yAxis: [{ // Primary axis
                    className: 'highcharts-color-0',
                    title: {
                        text: 'Asistencias'
                    }
                }],
            
                plotOptions: {
                    column: {
                        borderRadius: 5
                    }
                },
            
                series: [{
                    name: 'Asistencias',
                    data: <?= $valores ?>
                }]
            
            });
        </script>
    @endsection
@endif