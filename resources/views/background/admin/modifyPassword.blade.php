@extends('background.admin.login')
@section('title')
    修改密码
@stop
@section('action')
    <form action="{{url('background/modifyPassword')}}" method="post">
@stop
@section('box-body')
    <div class="loginbox-title">修改密码</div>
    <div class="loginbox-textbox">
        <input class="form-control" placeholder="请输入新密码" name="password" type="password">
    </div>
    <div class="loginbox-textbox">
        <input class="form-control" placeholder="请再输入一次" name="passwords" type="password">
    </div>
    <div class="loginbox-submit">
        <input class="btn btn-primary btn-block" value="确认修改" type="submit">
    </div>
    <div class="loginbox-submit">
        <input class="btn btn-primary btn-block" value="取消" type="button" onclick="javascript:history.back(-1);">
    </div>
@stop