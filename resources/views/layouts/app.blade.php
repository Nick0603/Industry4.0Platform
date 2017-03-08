<!DOCTYPE html>
<html lang="en">
<head>
    @yield('header')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: '微軟正黑體';
            font-size: 200%;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    遠端監控系統
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">首頁</a></li>
                    
                    @if ( ! isset($machine) )
                        <li><a href="{{ url('/data/machines/first/immediate') }}">即時監控</a></li>
                        <li><a href="{{ url('/data/machines/first/machineData/utilization/latestOrder') }}">加工資訊</a></li>
                        
                        @if (Auth::check() and Auth::user()->name == "admin"))
                                <li><a href="{{ url('/data/status') }}">Status(測試用)</a></li>
                                <li><a href="{{ url('/data/machines/1/test') }}">機台連線模擬(測試用)</a></li>
                        @endif
                    @else
                            <li><a href="{{ url('/data/machines/'.$machine->id.'/immediate') }}">即時監控</a></li>
                            <li><a href="{{ url('/data/machines/'.$machine->id.'/machineData/utilization/latestOrder') }}">加工資訊</a></li>
                        @if (Auth::check() and Auth::user()->name == "admin"))
                                <li><a href="{{ url('/data/status') }}">Status(測試用)</a></li>
                                <li><a href="{{ url('/data/machines/'.$machine->id.'/test') }}">機台連線模擬(測試用)</a></li>
                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                        @if (isset($machine) )
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if (isset($machine) )
                                    機台：{{$machine->name}}
                                @else
                                    機台：未選
                                @endif
                                <span class="caret"></span>
                            </a>

                            <ul id='machinesSeletor' class="dropdown-menu" role="menu">
                                @foreach (Auth::user()->company->machines as $mach)
                                    <li>
                                        <a machineid="{{$mach->id}}">
                                            {{$mach->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- JavaScripts -->

    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @if (!Auth::guest())
        <script src="/layout/main.js"></script>
    @endif

    @yield('script')
</body>
</html>
