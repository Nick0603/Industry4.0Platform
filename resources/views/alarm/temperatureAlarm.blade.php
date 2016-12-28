@extends('layouts.mail')

@section('content')

    <h2>{{ $subject }}</h2>
    <div>{{ $msg }}</div>
    <div><b>提醒：此封信為系統自動發射，請勿直接回覆</div>
    <div>詳細即時狀況請到</b><a href='{{$url}}'>監控系統網頁</a>查詢</div>

@endsection