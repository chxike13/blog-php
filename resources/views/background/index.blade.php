<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','首页')</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="{{asset('static/background/style/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/weather-icons.css')}}" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="{{asset('static/background/style/beyond.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('static/background/style/demo.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/typicons.css')}}" rel="stylesheet">
    <link href="{{asset('static/background/style/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet">

</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="{{url('background/index')}}" class="navbar-brand">
                    <small>
                        <img src="{{asset('static/background/images/laravellogo.svg')}}" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="{{asset('static/background/images/adam-jansen.jpg')}}">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>{{session()->get('username')}}</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="{{url('background/login')}}">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="{{url('background/modifyPassword')}}">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <input class="searchinput" type="text">
                <i class="searchicon fa fa-search"></i>
                <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
            </div>
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
            <ul class="nav sidebar-menu">
                <!--Dashboard-->
                <li @section('人员') @show>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">人员</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li @section('人员管理') @show>
                            <a href="{{url('background/roleList')}}">
                                <span class="menu-text">人员管理</span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li @section('文档') @show>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-file-text"></i>
                        <span class="menu-text">文档</span>
                        <i class="menu-expand"></i>
                    </a>
                    <ul class="submenu">
                        <li @section('文章') @show>
                            <a href="{{url('background/articleList')}}">
                                <span class="menu-text">文章管理</span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li @section('标签') @show>
                            <a href="{{url('background/tagList')}}">
                                <span class="menu-text">标签管理</span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                        <li @section('栏目') @show>
                            <a href="{{url('background/cateList')}}">
                                <span class="menu-text">栏目管理</span>
                                <i class="menu-expand"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /Sidebar Menu -->
        </div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            @section('page-breadcrumbs')
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li class="active">控制面板</li>
                </ul>
            </div>
            @show
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            @section('page-body')
                <div class="page-body">

                    <div style="text-align:center; line-height:1000%; font-size:24px;">
                        欢迎登录个人博客后台<br>
                        <p style="color:#aaa;">Welcome everybody！</p></div>
                </div>
            @show


        </div>
        <!-- /Page Body -->
    </div>
    <!-- /Page Content -->
</div>
</div>

<!--Basic Scripts-->
<script src="{{asset('static/background/style/jquery_002.js')}}"></script>
<script src="{{asset('static/background/style/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap-select.js')}}"></script>
<script src="{{asset('static/background/style/jquery.js')}}"></script>
<!--Beyond Scripts-->
<script src="{{asset('static/background/style/beyond.js')}}"></script>


</body>
</html>