<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="{{ asset('css/bootstrap_fonts') }}" type="text/css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{asset('css/bootstrap_css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/bootstrap_css/carousel.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/navbar_css/navbar.css')}}" type="text/css" rel="stylesheet ">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        body {
            font-family: 'Lato';
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
            @if(Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">
                    PMS
                </a>
            @endif
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if(!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
                <a class="navbar-brand" href="{{ url('projects/create') }}">
                    create project
                </a>
                <a class="navbar-brand" href="{{ url('sprints/create') }}">
                    create sprint
                </a>
                <a class="navbar-brand" href="{{ url('tasks/create') }}">
                    create task
                </a>
                @endif
                        <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
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
@yield('content')
        <!-- JavaScripts -->
<script src="{{asset('js/jquery/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap_js/bootstrap.min.js')}}"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
