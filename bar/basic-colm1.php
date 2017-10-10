<?php
/**
 *
 *
 * @link          https://github.com/mzm-dev 
 * @demo          http://highcharts-mzm.rhcloud.com
 * @created       September 2014
 * @fb            https://www.facebook.com/zakimedia
 * @email         mohdzaki04@gmail.com
 */
$cakeDescription = "Highcharts Bar Chart";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $cakeDescription ?></title>
        <link href="../webroot/css/cake.generic.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container',
                        type: 'line'
                    },
                    title: {
                        text: 'Highcharts Chart PHP with MySQL Example',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'Sumber : Jabatan XYZ',
                        x: -20
                    },
                    xAxis: {
                        categories: []
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah Pelawat'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>:<b>{point.y} dari Total'
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y}'
                            }
                        }
                    },
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom',
                        x: 0,
                        y: 0,
                        floating: false,
                        shadow: false
                    },
                    series: []
                };
                $.getJSON("data/data-basic-colm-data-luas.php", function(json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
                    options.series[1] = json[2];
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body>
        <a class="link_header" href="/highcharts/">&lt;&lt; Back to index</a>
        <div id="container" style="min-width: 320px; height: 400px; margin: 0 auto"></div>
    </body>
</html>
