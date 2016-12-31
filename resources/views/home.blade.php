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
                                    <td class="col-md-3">公司名稱</td>
                                    <td>{{Auth::user()->company->name}}</td>
                                </tr>
                                <tr >
                                    <td>公司ID</td>
                                    <td>{{Auth::user()->company->id}}</td>
                                </tr>
                                <tr>
                                    <td>公司地址</td>
                                    <td>{{Auth::user()->company->address}}</td>
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
                          <th class="text-center col-md-1">日期</th>
                          <th class="text-center col-md-3">標題</th>
                          <th class="text-center col-md-8">內容</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="utilizationTable">
                    @foreach($bulletinBoards as $information)
                        <tr>
                            <th scope="row">{{$information->created_at->month}}/{{$information->created_at->day}}</th>
                            <td>{{$information->title}}</td>
                            <td>
                              {{$information->content}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
