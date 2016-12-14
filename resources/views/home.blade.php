@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                <div class="jumbotron">
                  <h1>組織內部公告欄</h1>
                </div>


            <div class="panel panel-default">
                <div class="panel-heading">公司簡介</div>
                <div class="panel-body">

                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>公司名稱</td>
                                    <td>{{Auth::user()->company->name}}</td>
                                </tr>
                                <tr >
                                    <td>公司ID</td>
                                    <td>{{Auth::user()->company->id}}</td>
                                </tr>
                                <tr>
                                    <td>公司地址</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>機台總數</td>
                                    <td>{{Auth::user()->company->machines->count()}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">最新消息</div>
                <table class="table text-center">
                    <thead class="thead-inverse">
                        <tr>
                            <th class="text-center" style="width: 5%">日期</th>
                            <th class="text-center" style="width: 20%">標題</th>
                            <th class="text-center" style="width: 75%">內容</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">12/13</th>
                        <td>馬達研發突破</td>
                        <td>
                          blabla..
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
