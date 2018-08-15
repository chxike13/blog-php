@extends('background.index')
@section('title')
    栏目列表
@stop
@section('文档')
    class="open"
@stop
@section('栏目')
    class="open active"
@stop
@section('page-body')
    <div class="page-body">

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '{{url('background/updateCate?act=add')}}'"> <i class="fa fa-plus"></i> Add
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
                                    <th class="text-center">栏目名</th>
                                    <th class="text-center">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cates as $cate)
                                    <tr>
                                        <td align="center">{{$cate->catename}}</td>
                                        <td align="center">
                                            <a href="{{url("background/updateCate?act=mod&id={$cate->id}")}}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onClick="warning('确实要删除吗', '{{url("background/cateList?act=del&id={$cate->id}")}}')" class="btn btn-danger btn-sm shiny">
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
            <li class="active">标签列表</li>
        </ul>
    </div>
@stop