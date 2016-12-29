@extends('layouts.app')

@section('header')
<!-- 設定讓post可以連線 -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <script src="/amcharts/amcharts.js"></script>
    <script src="/amcharts/serial.js"></script>
    <script src="/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="/amcharts/themes/light.js"></script>
    <script src="/amcharts/themes/patterns.js"></script>
    <style>
        #chartdivSpinderLoad,#chartdivTemperature {
            width   : 100%;
            height  : 500px;
        }           
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-primary">
                <div class="panel-heading">機台資訊</div>
                <div class="panel-body">

                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>連線狀態</td>
                                    <td id='conn'>尚未連接</td>
                                </tr>
                                <tr >
                                    <td>機台名稱</td>
                                    <td>{{$machine->name}}</td>
                                </tr>
                                <tr>
                                    <td>機台位置</td>
                                    <td>{{$machine->address}}</td>
                                </tr>
                                <tr>
                                    <td>機台編號</td>
                                    <td>{{$machine->id}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="panel panel-primary">
                <div class="panel-heading">即時座標</div>
                <div class="panel-body">

                    
                   <div class="col-md-12">
                        <table class="table table-bordered ">

                            <tbody>
                                <tr >
                                    <td class="col-md-2 info">執行中的程式名稱</td>
                                    <td id='runningCodeName'>待連線</td>
                                </tr>
                                <tr >
                                    <td class="col-md-2 info">執行中的程式行號</td>
                                    <td id='runningCodeIndex'>待連線</td>
                                </tr>
                                <tr >
                                    <td class="col-md-2 info">執行中的 G Code</td>
                                    <td id='runningGCode'>待連線</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td>座標名</td>
                                    <td>值</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>機械座標 x</td>
                                    <td id='m_x'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>機械座標 y</td>
                                    <td id='m_y'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>機械座標 z</td>
                                    <td id='m_z'>未讀取</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <td>座標名</td>
                                    <td>值</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>絕對座標 x</td>
                                    <td id='abs_x'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>絕對座標 y</td>
                                    <td id='abs_y'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>絕對座標 z</td>
                                    <td id='abs_z'>未讀取</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading"> 即時主軸資訊</div>
                    <div class="panel-body" >

                        <table class="table table-bordered ">

                            <tbody>
                                <tr >
                                    <td class="col-md-3 info">主軸溫度(攝氏)</td>
                                    <td id='temperature'>待連線</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="chartdivTemperature">未讀取到資料</div>

                        <table class="table table-bordered ">
                            <tbody>
                                <tr >
                                    <td class="col-md-3 info">主軸負載電流值</td>
                                    <td id='spinderLoad'>待連線</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="chartdivSpinderLoad">未讀取到資料</div>
                    </div>
                </div>
            </div>

            

        </div>
    </div>
@endsection

@section('script')
    <script src={{ asset("/ajax/spinderLoad.js") }}></script>
    <script src={{ asset("/ajax/temperature.js") }}></script>
    <script src={{ asset('/ajax/monitor.js') }}></script>
@endsection