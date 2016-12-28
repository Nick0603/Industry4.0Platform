<!DOCTYPE html>
<html lang="en">
<head>
    @yield('header')
    <meta charset="utf-8">
    <style>
        body {
            font-family: '微軟正黑體';
        }

    </style>
</head>
    <body>
        @yield('content')
        <br><br>
        <div><b>公司名稱:</b> {{ $company }}</div>
        <div><b>公司地址:</b> {{ $address }}</div>
        <div><b>email:</b> {{ $email }}</div>
    </body>
</html>