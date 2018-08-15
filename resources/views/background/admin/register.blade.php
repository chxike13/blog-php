@extends('background.admin.login')
@section('title')
    用户注册
@stop
@section('box-body')
    <div class="loginbox-title">注册</div>
    <div class="loginbox-textbox">
        <input value="" class="form-control" placeholder="请输入用户名" name="username" type="text">
    </div>
    <div class="loginbox-textbox">
        <input class="form-control" placeholder="请输入密码" name="password" type="password">
    </div>
    <div class="loginbox-textbox">
        <input class="form-control" placeholder="请再次输入密码" name="passwords" type="password">
    </div>
    <div class="loginbox-submit">
        <input class="btn btn-primary btn-block" value="注册" type="submit">
    </div>
@stop
@section('action')
    <form action="{{url('background/register')}}" method="post">
@stop