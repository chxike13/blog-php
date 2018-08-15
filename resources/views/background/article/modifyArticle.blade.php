@extends('background.index')
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
                        <span class="widget-caption">修改文章</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="{{url('background/updateArticle')}}" method="post">
                                @csrf
                                <input type="hidden" name="act" value="mod">
                                <input type="hidden" name="id" value="{{$article->id}}">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="title" placeholder="标题" value="{{$article->title}}" name="title" required="required" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="author" placeholder="作者" value="{{$article->author}}" name="author" required="required" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">标签</label>
                                    <div class="col-sm-6">
                                        <select name="keywords[]" class="selectpicker form-control" multiple="multiple" style="width: 100%;">
                                            @foreach($tags as $tag)
                                                @if(in_array($tag->tagname,$keywords))
                                                    <option  selected="selected" value="{{$tag->tagname}}">{{$tag->tagname}}</option>
                                                @else
                                                    <option  value="{{$tag->tagname}}">{{$tag->tagname}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">栏目</label>
                                    <div class="col-sm-6">
                                        <select name="cateid" class="selectpicker form-control" style="width: 100%;">
                                            @foreach($cates as $cate)
                                                @if($cate->id == $article->cateid)
                                                    <option selected="selected" value="{{$cate->id}}">{{$cate->catename}}</option>
                                                @else
                                                    <option value="{{$cate->id}}">{{$cate->catename}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">是否设置热门推荐</label>
                                    <div class="col-sm-6">
                                        <select name="cateid" class="selectpicker" style="width: 100%;">
                                            @if($article->state == 0)
                                                <option  value="0" selected="selected" name="state">否</option>
                                                <option  value="1" name="state">是</option>
                                            @else
                                                <option  value="0"  name="state">否</option>
                                                <option  value="1" selected="selected" name="state">是</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">文章简介</label>
                                    <div class="col-sm-6">
                                        <textarea name="desc" id="desc" cols="105" rows="5">{{$article->desc}}</textarea>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right">文章内容</label>
                                    <div class="col-sm-6">
                                        <textarea name="content" id="content" cols="105" rows="15">{{$article->content}}</textarea>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">保存信息</button>
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
            <li class="active">修改文章</li>
        </ul>
    </div>
@stop