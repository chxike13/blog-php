<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head-->
<head>
    <meta charset="utf-8">
    <title>@yield('title','用户登录')</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="{{asset('static/background/style/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/font-awesome.css')}}" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="{{asset('static/background/style/beyond.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/demo.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/animate.css')}}" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
<div class="login-container animated fadeInDown">
    @include('background.message')
@section('action')
    <form action="{{url('background/login')}}" method="post">
        @show
        @csrf
        <div class="loginbox bg-white">
            @section('box-body')
                <div class="loginbox-title">登录</div>
                <div class="loginbox-textbox">
                    <input value="" class="form-control" placeholder="请输入用户名" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="请输入密码" name="password" type="password">
                </div>
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="登录" type="submit">
                </div>
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="注册" type="button" onclick="window.location.href='{{url('background/register')}}'">
                </div>
            @show
        </div>
        <div class="logobox">
            <p class="text-center">Tp5</p>
        </div>
    </form>
</div>
<!--Basic Scripts-->
<script src="{{asset('static/background/style/jquery.js')}}"></script>
<script src="{{asset('static/background/style/bootstrap.js')}}"></script>
<script src="{{asset('static/background/style/jquery_002.js')}}"></script>
<!--Beyond Scripts-->
<script src="{{asset('static/background/style/beyond.js')}}"></script>
</body>
<!--Body Ends-->
</html>