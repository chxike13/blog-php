@extends('background.index')
@section('title')
    文章列表
@stop
@section('文档')
    class="open"
@stop
@section('文章')
    class="open active"
@stop
@section('page-body')
    <div class="page-body">

        <button type="button" tooltip="添加用户" class="btn btn-sm btn-success btn-addon" onClick="javascript:window.location.href = '{{url('background/updateArticle?act=add')}}'"> <i class="fa fa-plus"></i> Add
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
                                    <th class="text-center">标题</th>
                                    <th class="text-center">作者</th>
                                    <th class="text-center">关键字</th>
                                    <th class="text-center">栏目</th>
                                    <th class="text-center">点击量</th>
                                    <th class="text-center">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td align="center">{{$article->title}}</td>
                                    <td align="center">{{$article->author}}</td>
                                    <td align="center">{{$article->keywords}}</td>
                                    <td align="center">{{$article->cateid}}</td>
                                    <td align="center">{{$article->click}}</td>
                                    <td align="center">
                                        <a href="{{url("background/updateArticle?act=mod&id={$article->id}")}}" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onClick="warning('确实要删除吗', '{{url("background/articleList?act=del&id={$article->id}")}}')" class="btn btn-danger btn-sm shiny">
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
            <li class="active">文章列表</li>
        </ul>
    </div>
@stop