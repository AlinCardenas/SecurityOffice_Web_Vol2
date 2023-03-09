@extends('layouts.plantilla')

@section('title', 'Voltaje')

@section('content')
    <h1>Voltaje</h1>
    <figure class="highcharts-figure">
        <div class="d-flex justify-content-center">
            <div id="container" class="w-100 ">

            </div>
        </div>
    </figure>


</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

//???????????????????????????????????????????
Highcharts.chart('container', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: '40%'
    },

    title: {
        text: 'Voltaje'
    },

    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ['50%', '75%'],
        size: '110%'
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 5,
        tickPixelInterval: 5,
        tickPosition: 'inside',
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
        tickLength: 5,
        tickWidth: 4,
        minorTickInterval: null,
        labels: {
            distance: 20,
            style: {
                fontSize: '14px'
            }
        },
        plotBands: [{
            from: 4,
            to: 5,
            color: 'rgba(0, 0, 255, 0.56)', // green
            thickness: 20
        }, 
        {
            from: 1,
            to: 4,
            color: 'rgba(255, 255, 0, 0.8)', // yellow
            thickness: 20
        }, 
        {
            from: 0,
            to: 1,
            color: 'rgba(230, 230, 53, 0.42)', // yellow
            thickness: 20
        }, 
        //{
        //     from: 35,
        //     to: 50,
        //     color: '#DF5353', // red
        //     thickness: 20
        // }
    ]
    },

    series: [{
        name: 'Voltaje',
        data: [0],
        tooltip: {
            valueSuffix: ' V'
        },
        dataLabels: {
            format: '{y} V',
            borderWidth: 0,
            color: (
                Highcharts.defaultOptions.title &&
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color
            ) || '#333333',
            style: {
                fontSize: '16px'
            }
        },
        dial: {
            radius: '100%',
            backgroundColor: 'gray',
            baseWidth: 12,
            baseLength: '0%',
            rearLength: '0%'
        },
        pivot: {
            backgroundColor: 'gray',
            radius: 6
        }

    }]

});

// Add some life
setInterval(() => {
    
const chart = Highcharts.charts[0];
if (chart && !chart.renderer.forExport) {
    const point = chart.series[0].points[0],
    
    // aqui
    inc = <?= $voltaje ?>;
    console.log(inc);
    // let newVal = point.y + inc;
    // if (newVal < 0 || newVal > 5) {
    //     newVal = point.y - inc;
    // }
    

    point.update(inc);
}

}, 3000);

</script>
    

@endsection