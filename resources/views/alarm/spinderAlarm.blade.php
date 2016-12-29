@extends('layouts.mail')

@section('content')

    <h2>{{ $subject }}</h2>
    <div>警告項目：{{$alarmItem}}</div>
    <div>警告數值：<b>{{$alarmValue}}<b></div>
    <div>警告時間：<b>{{$alarmTime}}<b></div>
    <div>警告訊息：{{ $msg }}</div>
    <div><b>提醒：此封信為系統自動發射，請勿直接回覆</div>
    <div>詳細即時狀況請到</b><a href='{{$url}}'>監控系統網頁</a>查詢</div>

@endsection