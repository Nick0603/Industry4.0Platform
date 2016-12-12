@extends('layouts.app')

@section('header')
   <title>加工資訊</title>

    <!-- Styles -->
    <style>
    #chartdiv {
        width   : 100%;
        height  : 500px;
    }            
     
    </style>

    <!-- Resources -->
    <script src="/amcharts/amcharts.js"></script>
    <script src="/amcharts/serial.js"></script>
    <script src="/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="/amcharts/themes/patterns.js"></script>

    <!-- Chart code -->
    <script>
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "patterns",
        "marginRight":60,
        "autoMarginOffset":20,
        "dataDateFormat": "YYYY-MM-DD",
        "dataProvider": [{
            "date": "2012-01-01",
            "value": 8
        }, {
            "date": "2012-01-01",
            "value": 8
        }, {
            "date": "2012-01-02",
            "value": 10
        }, {
            "date": "2012-01-03",
            "value": 12
        }, {
            "date": "2012-01-04",
            "value": 14
        }, {
            "date": "2012-01-05",
            "value": 11
        }, {
            "date": "2012-01-06",
            "value": 6
        }, {
            "date": "2012-01-07",
            "value": 7
        }, {
            "date": "2012-01-08",
            "value": 9
        }, {
            "date": "2012-01-09",
            "value": 13
        }, {
            "date": "2012-01-10",
            "value": 15
        }, {
            "date": "2012-01-11",
            "value": 19
        }, {
            "date": "2012-01-12",
            "value": 21
        }, {
            "date": "2012-01-13",
            "value": 22
        }, {
            "date": "2012-01-14",
            "value": 20
        }, {
            "date": "2012-01-15",
            "value": 18
        }, {
            "date": "2012-01-16",
            "value": 14
        }, {
            "date": "2012-01-17",
            "value": 16
        }, {
            "date": "2012-01-18",
            "value": 18
        }, {
            "date": "2012-01-19",
            "value": 17
        }, {
            "date": "2012-01-20",
            "value": 15
        }, {
            "date": "2012-01-21",
            "value": 12
        }, {
            "date": "2012-01-22",
            "value": 10
        }, {
            "date": "2012-01-23",
            "value": 8
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left",
            "tickLength": 0
        }],
        "graphs": [{
            "balloonText": "[[category]]<br>"+
            "<b><span style='font-size:14px;'>稼動率:[[busyTimer]]</span></b><br>"+
            "<b><span style='font-size:14px;'>busy:[[busyTimer]]</span></b><br>"+
            "<b><span style='font-size:14px;'>idle:[[idleTimer]]</span></b><br>"+
            "<b><span style='font-size:14px;'>alarm:[[alarmTimer]]</span></b><br>"+
            "<b><span style='font-size:14px;'>off:[[offTimer]]</span></b><br>",
            "bullet": "round",
            "dashLength": 3,
            "colorField":"color",
            "valueField": "value"
        }],
        "chartScrollbar": {
            "scrollbarHeight":2,
            "offset":-1,
            "backgroundAlpha":0.1,
            "backgroundColor":"#888888",
            "selectedBackgroundColor":"#67b7dc",
            "selectedBackgroundAlpha":1
        },
        "chartCursor": {
            "fullWidth":true,
            "valueLineEabled":true,
            "valueLineBalloonEnabled":true,
            "valueLineAlpha":0.5,
            "cursorAlpha":0
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "axisAlpha": 0,
            "gridAlpha": 0.1,
            "minorGridAlpha": 0.1,
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true
         }
    });

    chart.addListener("dataUpdated", zoomChart);

    function zoomChart(){
        chart.zoomToDates(new Date(2012, 0, 5), new Date(2012, 0, 13));
    }

    </script>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-10 dropdown col-md-2">
            <div class = "btnRight">
                <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                辨識碼(貨號)
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">11111111111</a></li>
                    <li><a href="#">22222222222</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="panel panel-default">
                 <div class="panel-heading">稼動率折線圖</div>
                <div id="chartdiv"></div>
            </div>
            <div class="panel panel-default">
                 <div class="panel-heading">稼動率詳細資訊</div>
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>日期</th>
                      <th>稼動率</th>
                      <th>BUSY</th>
                      <th>IDLE</th>
                      <th>ALARM</th>
                      <th>OFF</th>
                      <th>備註</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@TwBootstrap</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection