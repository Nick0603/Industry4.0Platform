@extends('layouts.app')

@section('header')
<!-- 設定讓post可以連線 -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


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
                                    <td>台灣科技大學百軸加工機</td>
                                </tr>
                                <tr>
                                    <td>機台位置</td>
                                    <td>台科大機械系</td>
                                </tr>
                                <tr>
                                    <td>機台blabla</td>
                                    <td></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="panel panel-primary">
                <div class="panel-heading">即時資訊</div>
                <div class="panel-body">
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
                                    <td>Machine_X</td>
                                    <td id='m_x'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>Machine_Y</td>
                                    <td id='m_y'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>Machine_Z</td>
                                    <td id='m_z'>未讀取</td>
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
                                    <td>Absolute_X</td>
                                    <td id='abs_x'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>Absolute_Y</td>
                                    <td id='abs_y'>未讀取</td>
                                </tr>
                                <tr>
                                    <td>Absolute_Z</td>
                                    <td id='abs_z'>未讀取</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('script')
    <script src='/ajax/monitor.js'></script>
@endsection