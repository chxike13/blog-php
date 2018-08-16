@extends('background.index')
@section('title')
    用户管理
@stop
@section('人员')
    class="open"
@stop
@section('人员管理')
    class="open active"
@stop
@section('page-body')
    <div class="page-body">

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-success btn-addon" onClick="javascript:window.location.href = '{{url('background/updateRole?act=add')}}'"> <i class="fa fa-plus"></i> Add
        </button>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-body">
                        @include('background.message')
                        <div class="flip-scroll">
                            <table class="table table-bordered table-hover">
                                <thead class="">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">用户名称</th>
                                    <th class="text-center">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td align="center">{{$role->id}}</td>
                                    <td align="center">{{$role->username}}</td>
                                    <td align="center">
                                        <a href="{{url("background/updateRole?act=mod&username={$role->username}&id={$role->id}")}}" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onClick="warning('确实要删除吗', '{{url("background/roleList?act=del&id={$role->id}")}}')" class="btn btn-danger btn-sm shiny">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
@section('page-breadcrumbs')
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="{{url('background/index')}}">首页</a>
            </li>
            <li class="active">用户管理</li>
        </ul>
    </div>
@stop