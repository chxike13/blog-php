@extends('background.index')
@section('title')
    添加文章
@stop
@section('文档')
    class="open"
@stop
@section('文章')
    class="open active"
@stop
@section('page-body')
<div class="page-body">

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption">新增文章</span>
                </div>
                <div class="widget-body">
                    <div id="horizontal-form">
                        <form class="form-horizontal" role="form" action="{{url('background/updateArticle')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="act" value="add">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="title" placeholder="标题" name="title" required="required" type="text">
                                </div>
                                <p class="help-block col-sm-4 red">* 必填</p>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="author" placeholder="作者" name="author" required="required" type="text">
                                </div>
                                <p class="help-block col-sm-4 red">* 必填</p>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label no-padding-right">插图</label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="pic" placeholder="插图" name="img" required="required" type="file">
                                </div>
                                <p class="help-block col-sm-4 red">* 必填</p>
                            </div>

                            <div class="form-group">
                                <label for="group_id" class="col-sm-2 control-label no-padding-right">标签</label>
                                <div class="col-sm-6">
                                    <select name="keywords[]" class="selectpicker form-control" multiple="multiple" style="width: 100%;">
                                        @foreach($tags as $tag)
                                        <option  value="{{$tag->tagname}}">{{$tag->tagname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="group_id" class="col-sm-2 control-label no-padding-right">栏目</label>
                                <div class="col-sm-6">
                                    <select name="cateid" class="selectpicker" style="width: 100%;">
                                        @foreach($cates as $cate)
                                        <option  value="{{$cate->id}}">{{$cate->catename}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="group_id" class="col-sm-2 control-label no-padding-right">是否设置热门推荐</label>
                                <div class="col-sm-6">
                                    <select name="state" class="selectpicker" style="width: 100%;">
                                        <option  value="0" selected="selected" name="state">否</option>
                                        <option  value="1" name="state">是</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label no-padding-right">文章简介</label>
                                <div class="col-sm-6">
                                    <textarea name="desc" id="desc" cols="105" rows="5" ></textarea>
                                </div>
                                <p class="help-block col-sm-4 red">* 必填</p>
                            </div>

                            <div class="form-group" style="display: none">
                                <label for="username" class="col-sm-2 control-label no-padding-right">文章内容</label>
                                <div class="col-sm-6" >
                                    <textarea name="content" id="content" cols="105" rows="5" ></textarea>
                                </div>
                                <p class="help-block col-sm-4 red">* 必填</p>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label no-padding-right">文章内容</label>
                                <div class="col-sm-6" id="contentEditor">
                                </div>
                                <p class="help-block col-sm-4 red">* 必填</p>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" id="save" class="btn btn-default">保存信息</button>
                                </div>
                            </div>
                        </form>
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
        <li>
            <a href="{{url('background/articleList')}}">文章管理</a>
        </li>
        <li class="active">添加文章</li>
    </ul>
</div>
@stop