@extends('layouts.app')

@section('header')
<!-- 設定讓post可以連線 -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        </div>
    </div>

</div>

@endsection

@section('script')
    <script src='/ajax/test_monitor.js'></script>
@endsection