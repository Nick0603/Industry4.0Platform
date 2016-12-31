@extends('layouts.app')

@section('header')
   <title>加工資訊</title>

    <!-- Styles -->
    <style>
    #chartdiv {
        width   : 100%;
        height  : 500px;
    }           


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

                      顯示項目：{{$DisplayType}}
                  
                  <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="utilizationDisplay" id="utilizationDetailList">
                          <li><a href="../{{$selected_order->itemType}}/all">
                              全部
                          </a></li>
                  </ul>
              </div>
          </div>
        </div>

        <div class="panel panel-default"">
          
            <div class="panel-heading">稼動率詳細資訊</div>
            <div class="panel-body">
              <div class="col-md-10 col-md-offset-1" id = "utilizationDeteal">
                {{ Form::open(array('url' =>  url()->current(), 'method' => 'post'))}}
                  <div class="form-group">
                    <label class="col-sm-2 ">日期：</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id = "utilizationDate">test</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 ">稼動率：</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id = "utilizationValue">test</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 ">Busy：</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id = "busyTimer">test</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 ">Idle：</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id = "idleTimer">test</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 ">Alarm：</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id = "alarmTimer">test</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 ">Off：</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id = "offTimer">test</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="remarkTitle">備註標題</label>
                    <input name="remarkTitle" type="text" class="form-control" id="remarkTitle" placeholder="點我輸入備註標題">
                  </div>
                  <div class="form-group">
                    <label for="remarkContent">備註內容</label>
                    <textarea name="remarkContent" type="text" class="form-control" id="remarkContent" rows="5" placeholder="點我輸入備註內容">
                        
                    </textarea>
                  </div>
                  <button type="submit" class="btn btn-default">更新備註</button>
                {{ Form::close() }}
              </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="/MachineData/utilization.js"></script>
@endsection