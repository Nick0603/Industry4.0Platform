@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="col-md-12 jumbotron">
              <img src="{{url('/image/systemHome2.jpg')}}" class="img-responsive" alt="Image" >
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">最新消息</div>
                 <table class="table text-center">
                      <thead>
                        <tr>
                          <th class="text-center col-md-1">日期</th>
                          <th class="text-center col-md-3">標題</th>
                          <th class="text-center col-md-8">內容</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="text-center" >12/13</th>
                          <td>稼動率呈現設計與實作</td>
                          <td>
                            使用amChart框架呈現資料庫中稼動率資料。
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">11/16</th>
                          <td>專題說明簡報</td>
                          <td>
                            系統架構說明及目前進度報告
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">11/05</th>
                          <td>即時監控測試測試完成</td>
                          <td>
                            使用SkyMars抓取機台資訊再透過系統即時呈現
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">09/25</th>
                          <td>關聯式資料庫建立</td>
                          <td>
                            建立資料基本架構(公司=>(使用者、機台)=>(加工資訊、訂單)
                          </td>
                        </tr>
                         <tr>
                          <th scope="row">09/24</th>
                          <td>網頁MVC架構初始設定</td>
                          <td>
                            PHP-Laravel框架創立，使用會員系統框架
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">實作中進度</div>
                <table class="table text-center">
                  <thead class="thead-inverse">
                    <tr>
                      <th class="text-center" style="width: 5%">編號</th>
                      <th class="text-center" style="width: 20%">項目</th>
                      <th class="text-center" style="width: 75%">進度</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>基本資料庫架設</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                          100% Complete 
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>即時監控測試</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                          100% Complete 
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>會員認證機制</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            40% Complete 
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>稼動率資訊</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                          80% Complete 
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
