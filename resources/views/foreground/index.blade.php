<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>@yield('title','Hello World！')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Tp5"/>
    <meta name="description" content="Tp5"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <link href="{{asset('static/foreground/style/lady.css')}}" type="text/css" rel="stylesheet"/>
    <script type='text/javascript' src='{{asset('static/foreground/style/ismobile.js')}}'></script>
    <script type="text/javascript" src="{{asset('static/foreground/style/jquery-3.3.1.min.js')}}"></script>
</head>

<body>

<div class="ladytop">
    <div class="nav">
        <div class="left"><a href="{{url('foreground/index')}}"><img src="{{asset('static/foreground/images/laravellogo.svg')}}" style="left: 0;" alt="wed114婚尚"></a></div>
        <div class="right">
            <div class="box">
                @foreach($cates as $cate)
                    <a href="javascript:void(0)" onclick="getList('cate',{{$cate->id}})" >{{$cate->catename}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="hotmenu">
    <div class="con">热门标签：
        @foreach($tags as $tag)
            <a href='javascript:void(0)' onclick="getList('tag','{{$tag->tagname}}')" >{{$tag->tagname}}</a>
        @endforeach
    </div>
</div>

<!--顶部通栏-->


<div class="position" id="position">
    @section('position')
    @show
</div>

<div class="overall">

    <div class="left" id="article">
        @foreach($articles as $article)
        <div class="xnews2">
            <div class="pic">
                <a  href="javascript:void(0)" onclick="getArticle({{$article->id}})">
                    <img src="{{asset("storage/img/{$article->pic}")}}" alt="图挂了"/>
                </a>
            </div>
            <div class="dec">
                <h3>
                    <a href="javascript:void(0)" onclick="getArticle({{$article->id}})">{{$article->title}}</a>
                </h3>
                <div class="time">发布时间：{{$article->create_time}}</div>
                <p>{{$article->desc}}</p>
                <div class="time"></div>
            </div>
        </div>
        @endforeach
        <div class="pages">
            <div class="plist">
                {{$articles->links()}}
            </div>
        </div>
    </div>


    <div class="right">
        <!--右侧各种广告-->
        <!--猜你喜欢-->
        <div id="hm_t_57953">
            <div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
                <div class="hm-t-container" style="width: 298px;">
                    <div class="hm-t-main">
                        <div class="hm-t-header">热门点击</div>
                        <div class="hm-t-body">
                            <ul class="hm-t-list hm-t-list-img">
                                @foreach($clicks as $article)
                                <li class="hm-t-item hm-t-item-img">
                                    <a data-pos="0"
                                       title="{{$article->title}}"
                                       href="javascript:void(0)"
                                       onclick="getArticle({{$article->id}})"
                                       class="hm-t-img-title"
                                       style="visibility: visible;"><span>{{$article->title}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div style="height:15px"></div>
        <div id="hm_t_57953">
            <div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
                <div style="width: 298px;" class="hm-t-container">
                    <div class="hm-t-main">
                        <div class="hm-t-header">推荐阅读</div>
                        <div class="hm-t-body">
                            <ul class="hm-t-list hm-t-list-img">
                                @foreach($recommend as $article)
                                        <li class="hm-t-item hm-t-item-img">
                                            <a style="visibility: visible;"
                                               class="hm-t-img-title"
                                               href="javascript:void(0)"
                                               onclick="getArticle({{$article->id}})"
                                               title="{{$article->title}}"
                                               data-pos="0"><span>{{$article->title}}</span>
                                            </a>
                                        </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div style="height:15px"></div>

        {{--<div id="bdcs">--}}
            {{--<div class="bdcs-container">--}}
                {{--<meta content="IE=9" http-equiv="x-ua-compatible">   <!-- 嵌入式 -->--}}
                {{--<div id="default-searchbox" class="bdcs-main bdcs-clearfix">--}}
                    {{--<div id="bdcs-search-inline" class="bdcs-search bdcs-clearfix">--}}
                        {{--<form id="bdcs-search-form" autocomplete="off" class="bdcs-search-form" target="_blank" method="get" action="">--}}
                            {{--<input type="hidden" value="10711555151249188672" name="s">--}}
                            {{--<input type="hidden" value="1" name="entry">--}}
                            {{--<input type="hidden" value="gbk" name="ie">--}}
                            {{--<input type="text" placeholder="请输入关键词" id="bdcs-search-form-input"--}}
                                   {{--class="bdcs-search-form-input" name="q" autocomplete="off"--}}
                                   {{--style="line-height: 30px; width:220px;">--}}
                            {{--<input type="submit" value="搜索" id="bdcs-search-form-submit"--}}
                                   {{--class="bdcs-search-form-submit bdcs-search-form-submit-magnifier">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<div id="bdcs-search-sug" class="bdcs-search-sug" style="top: 552px; width: 239px;">--}}
                        {{--<ul id="bdcs-search-sug-list" class="bdcs-search-sug-list"></ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div style="height:15px"></div>


    </div>

</div>


<div class="footerd">
    <ul>
        <li>Copyright &#169; 2008-2016 all rights reserved 版权所有</li>
    </ul>
</div>

<div style="display:none;">
    {{--<script src='goto/my-65537.js' language='javascript'></script>--}}
    {{--<script src="images/js/count_zixun.js" language="JavaScript"></script>--}}
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function getArticle(id) {
        getPosition('art',id);
        $.get('{{url('foreground/getContent?id=')}}'+id,
            null,function (data) {
                $('#article').html(data);
            }
        );

    }
    function getList(act,id) {
        getPosition(act,id);
        $.get('{{url('foreground/getContent?act=')}}'+act+'&id='+id,
            null,function (data) {
                $('#article').html(data);
            }
        );
    }
    function getPosition(act,id) {
        $.get('{{url("foreground/getPosition?act=")}}'+act+'&id='+id,
            null,function (data) {
                $('#position').html(data);
            }
        );
    }

</script>
</body>
</html>