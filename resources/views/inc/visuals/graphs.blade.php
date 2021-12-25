<script>
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

        // Looping data in reverse order for real visuals ---|>

        <?php if (isset($smartMeter1)) { ?>
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Energy Usage on Room 1'
                },
                subtitle: {
                    text: 'Source: Smart Meter Device'
                },
                xAxis: {

                },
                yAxis: {
                    title: {
                        text: 'Usage of Energy, Voltage and Current'
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
                        name: 'Energy(Wh)',
                        data: [<?php foreach ($smartMeter1->reverse() as $data) { ?> <?= $data->energy . ', ' ?> <?php } ?>]
                    }, {
                        name: 'Voltage',
                        data: [<?php foreach ($smartMeter1->reverse() as $data) { ?> <?= $data->voltage . ', ' ?> <?php } ?>]
                    },
                    {
                        name: 'Current',
                        data: [<?php foreach ($smartMeter1->reverse() as $data) { ?> <?= $data->current . ', ' ?> <?php } ?>]
                    }
                ]
            });
        <?php } ?>


        <?php if (isset($smartMeter2)) { ?>
            Highcharts.chart('container2', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Energy Usage on Room 2'
                },
                subtitle: {
                    text: 'Source: Smart Meter Device'
                },
                xAxis: {

                },
                yAxis: {
                    title: {
                        text: 'Usage of Energy, Voltage and Current'
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
                        name: 'Energy(Wh)',
                        data: [<?php foreach ($smartMeter2->reverse() as $data) { ?> <?= $data->energy . ', ' ?> <?php } ?>]
                    }, {
                        name: 'Voltage',
                        data: [<?php foreach ($smartMeter2->reverse() as $data) { ?> <?= $data->voltage . ', ' ?> <?php } ?>]
                    },
                    {
                        name: 'Current',
                        data: [<?php foreach ($smartMeter2->reverse() as $data) { ?> <?= $data->current . ', ' ?> <?php } ?>]
                    }
                ]
            });
        <?php } ?>
</script>
