<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">




    <!-- CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/login.css')}}" rel="stylesheet" />

    <link href="{{asset('css/AdminLTE/AdminLTE.min.css')}}" rel="stylesheet" />

    <meta charset="UTF-8">

    <meta name="csrf_token" id="csrf_token" content="{{ csrf_token() }}">

    <!-- JS -->
    <script src="{{asset('/js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>



    <!-- iCheck -->

    <link href="{{asset('plugins/iCheck/square/orange.css')}}" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">{{trans('admin.user')}}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 35px">
                <label for="email">{{trans('admin.password')}}</label>
                <input type="password" class="form-control" name="password" placeholder="Password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row" >
                <div class="col-xs-12" style="padding: 0;">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> {{trans('admin.remember-me')}}
                        </label>
                    </div>
                </div><!-- /.col -->

            </div>

            <div class="row">
                <div class="col-xs-12" style="padding-right:0;padding-left: 0">
                    <button type="submit" class="btn btn-login">
                        {{trans('admin.login')}}
                    </button>
                </div>
            </div>
        </form>

        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>-->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


<!-- iCheck -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>

