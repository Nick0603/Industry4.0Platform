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
    <script src="/MachineData/utilizationChart.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-offset-9 col-md-3">
            
            <div class = "btnRight">
                <button class="btn btn-default dropdown-toggle " type="button" id="itemTyperList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    辨識碼(貨單)：{{ $selected_order->name}}
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="itemTyperList">
                    @foreach ($orders as $order)
                        <li><a href="../{{$order->itemType}}/all">
                            {{$order->name}}( {{$order->itemType}} )
                        </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="panel panel-default">
                 <div class="panel-heading">稼動率折線圖</div>
                <div id="chartdiv"></div>
            </div>
        </div>

        <div class="col-md-offset-9 col-md-3">
          <div class = "btnRight">
            <button class="btn btn-default dropdown-toggle " type="button" id="utilizationDisplay" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                      顯示項目：全部
                  
                  <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="utilizationDisplay" id="utilizationDetailList">
                          <li><a href="../{{$order->itemType}}/all">
                              全部
                          </a></li>
                  </ul>
              </div>
          </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default"">
                <div class="panel-heading">稼動率詳細資訊</div>
                <table class="table table-bordered text-center" >
                  <thead>
                    <tr class="bg-success" >
                      <th  class="text-center" style="width: 15%">日期</th>
                      <th  class="text-center" style="width: 15%">稼動率(%)</th>
                      <th  class="text-center" style="width: 10%">BUSY</th>
                      <th  class="text-center" style="width: 10%">IDLE</th>
                      <th  class="text-center" style="width: 10%">ALARM</th>
                      <th  class="text-center" style="width: 10%">OFF</th>
                      <th  class="text-center" style="width: 30%">備註</th>
                    </tr>
                  </thead>
                  <tbody class="text-center" id="utilizationTable">
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="/MachineData/utilization.js"></script>
@endsection