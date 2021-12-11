<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/custom-styles.css')}}" rel="stylesheet" />
    <link href="/frontend/datatables/css/jquery.dataTables.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('inc.top-navigation')
        @yield('content')
    </main>
    @include('inc.footer')
    <!-- Bootstrap core JS-->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <!-- abc.xyz -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="/frontend/jquery/jquery.min.js"></script>
    <script src="/frontend/datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $('table').dataTable();

        function confirmDeletion(formID, message) {
            var confirmed = confirm(message);
            if (confirmed) {
                document.getElementById(formID).submit();
            }
        }

        <?php if (isset($smartAquariumData)) { ?>
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Average PH, Temperature, Depth, Food'
                },
                subtitle: {
                    text: 'Source: Smart Aquarium Device'
                },
                xAxis: {

                },
                yAxis: {
                    title: {
                        text: 'Average PH, Temperature, Depth, Food'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                        name: 'Temperature (&deg;C)',
                        data: [<?php foreach ($smartAquariumData as $data) { ?> <?= $data->temperature . ', ' ?> <?php } ?>]
                    }, {
                        name: 'PH',
                        data: [<?php foreach ($smartAquariumData as $data) { ?> <?= $data->ph . ', ' ?> <?php } ?>]
                    },
                    {
                        name: 'Depth (cm<sup>3</sup>)',
                        data: [<?php foreach ($smartAquariumData as $data) { ?> <?= $data->depth . ', ' ?> <?php } ?>]
                    },
                    {
                        name: 'Food (grams)',
                        data: [<?php foreach ($smartAquariumData as $data) { ?> <?= $data->food_cycle . ', ' ?> <?php } ?>]
                    }
                ]
            });
        <?php } ?>
    </script>
</body>

</html>
