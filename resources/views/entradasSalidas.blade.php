@extends('layouts.plantilla')

@section('title', 'Entradas y salidas')

@section('content')
    <h1>Registros de entradas y salidas</h1>
    <div class="row">
        <div class="col">
            <div id="container">

            </div>
        </div>
    </div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
console.log(<?php $entradas ?>)
// Data retrieved from https://netmarketshare.com
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    }, 
    title: {
        text: 'Relacion de registros de entradas y salidas de personal',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Registrado',
        colorByPoint: true,
        data: [{
            name: 'Personal laborando',
            y: <?= $entradas ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'Personal que ha salido',
            y: <?= $salidas ?> 
        }]
    }]
});

</script>
@endsection

