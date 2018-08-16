@extends('background.index')
@section('文档')
    class="open"
@stop
@section('标签')
    class="open active"
@stop
@section('title')
    标签列表
@stop
@section('page-body')
    <div class="page-body">

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-success btn-addon" onClick="javascript:window.location.href = '{{url('background/updateTag?act=add')}}'"> <i class="fa fa-plus"></i> Add
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
                                    <th class="text-center">标签名</th>
                                    <th class="text-center">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td align="center">{{$tag->tagname}}</td>
                                        <td align="center">
                                            <a href="{{url("background/updateTag?act=mod&id={$tag->id}")}}" class="btn btn-primary btn-sm shiny">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                            <a href="#" onClick="warning('确实要删除吗', '{{url("background/tagList?act=del&id={$tag->id}")}}')" class="btn btn-danger btn-sm shiny">
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