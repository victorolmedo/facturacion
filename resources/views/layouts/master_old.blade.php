<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('/img/car.png')}}" />
    <!-- CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <link href="{{asset('css/AdminLTE/AdminLTE.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/AdminLTE/AdminLTE.min.css')}}" rel="stylesheet" />

    <meta charset="UTF-8">

    <meta name="csrf_token" id="csrf_token" content="{{ csrf_token() }}">

    <!-- JS -->
    <script src="{{asset('/js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>

    <script language="javascript">
        $(document).ready(function () {
           /* $(window).resize(function () {
                resize();
            });
            resize();
            function resize() {
                $(".arrow-footer").css("border-left-width", $(window).width() );
            }*/

        });
    </script>

    @yield('head')
</head>

<body id="app-layout">

    <div id="loading" class="loading">
        <div class="container text-center" style="padding-top: 250px">
            <div class="row col-12-xs">
                {!! Html::image('img/loader.gif') !!}
            </div>
            <div class="row col-12-xs top-10">
                <span>{{trans("master.loading")}}</span>
            </div>
        </div>
    </div>

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
                    {!!   Html::image('img/car.png','car',['style'=> 'width: 40px; position: relative; top: -8px;']) !!}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @role('admin|commercial')  <li><a href="{{ url('/admin') }}">{{trans('menu.admin')}}</a></li> @endrole
                </ul>

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

<div class="container top-150" ></div>
<footer class="footer">
    <div class="arrow-footer"></div>
    <div class="container">

    </div>
</footer>

<div class="modal" id="modalError">
    <div class="modal-dialog modal-md">
        <div class="modal-content panel-danger" >
            <div class="modal-header panel-heading">

                <button type="button" class="close closeModalError" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{trans('master.close')}}</span></button>
                <h4 class="modal-title">{{trans('master.message')}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!  Form::label('', '', array('id' => 'lbl_error') ) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default closeModalError" data-dismiss="modal">{{trans('master.close')}}</button>
            </div>
        </div>
    </div>
</div>


@yield('footer')
</body>
</html>