@extends('layouts.plantilla')

@section('title', 'Entradas y salidas')

@section('content')
    <h1>Registros de entradas y salidas</h1>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                <div id="container" class="w-100 mx-5">

                </div>
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
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Comparación de registros de entradas y salidas'
    },
    subtitle: {
        align: 'left',

    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total de registros'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<p style="font-size:16px; color:black;">Cantidad: {point.y}</p>',
                
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:16px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}, font-size:18px">{point.name}</span>: <b>{point.y}</b><br/>',
    },

    series: [
        {
            name: 'Registros de entradas y salidas',
            colorByPoint: true,
            data: [
                {
                    name: '<p style="font-size:16px; color:black;">Entradas</p>',
                    y: <?= $entradas ?>,
                },
                {
                    name: '<p style="font-size:16px; color:black;">Salidas</p>',
                    y: <?= $salidas ?>,
                },
            ]
        }
    ],
    drilldown: {
        breadcrumbs: {
            position: {
                align: 'right'
            }
        },

    }
});
</script>
@endsection

