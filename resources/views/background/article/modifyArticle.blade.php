@extends('background.index')
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
                                        <select name="group_id" style="width: 100%;">
                                            <option selected="selected" value="奇闻">奇闻</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group_id" class="col-sm-2 control-label no-padding-right">栏目</label>
                                    <div class="col-sm-6">
                                        <select name="group_id" style="width: 100%;">
                                            <option selected="selected" value="奇闻">养生</option>
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
                <a href="#">系统</a>
            </li>
            <li>
                <a href="#">文章管理</a>
            </li>
            <li class="active">修改文章</li>
        </ul>
    </div>
@stop