
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
    {{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet" media="screen">--}}
    <link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">
    {{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet" media="screen">--}}

    <script type="text/javascript" src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}js/bootstrap.js"></script>


    <script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}js/weibo.js"></script>



    <script src="{{ URL::asset('/') }}js/libs/tether.min.js"></script>
    <script src="{{ URL::asset('/') }}js/libs/pace.min.js"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{ URL::asset('/') }}js/views/shared.js"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{ URL::asset('/') }}js/app.js"></script>
    <!-- Plugins and scripts required by this views -->
    {{--<script src="{{ URL::asset('/') }}js/libs/toastr.min.js"></script>--}}
    <script src="{{ URL::asset('/') }}js/libs/gauge.min.js"></script>
    <script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
    <!-- Custom scripts required by this view -->
    <script src="{{ URL::asset('/') }}js/views/main.js"></script>


    <style>
        body {
            padding-top: 20px;
            /*font-family:"微软雅黑";*/
        }


        .weibo-title {
            font-family: "微软雅黑";
        }

        .collect-no{
            background-color: transparent;
            color:#f8cb00;
            border-color: #f8cb00;
        }
        .collect-no:hover{
            background-color: #f8cb00;
            color:#ffffff;
            border-color: #f8cb00;
        }

        .collect-yes{
            background-color: #f8cb00;
            color:#ffffff;
            border-color: #f8cb00;
        }

        .collect-yes:hover{
            background-color: transparent;
            /*color:#f41a18;*/
            color:#f8cb00;
            border-color: #f8cb00;
        }



        .follow-no{
            background-color: transparent;
            color:#63c2de;
            border-color: #63c2de;
        }
        .follow-no:hover{
            background-color: #63c2de;
            color:#ffffff;
            border-color: #63c2de;
        }

        .follow-yes{
            background-color: #63c2de;
            color:#ffffff;
            border-color: #63c2de;
        }

        .follow-yes:hover{
            background-color: transparent;
            color:#63c2de;
            border-color: #63c2de;
        }

    </style>

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">


<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
            </li>

            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ URL::to('/exercise') }}">锻炼</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ URL::to('/activity') }}">活动</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ URL::to('/weibo') }}">微博</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right hidden-md-down">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{ Auth::user()->nickname }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-xs-center">
                        <strong>设置</strong>
                    </div>
                    <a class="dropdown-item" href="{{ URL::to('/personal') }}"><i class="fa fa-user"></i> 个人设置</a>
                    <a class="dropdown-item" href="{{ URL::to('/logout') }}"><i class="fa fa-lock"></i> 退出登录</a>
                </div>
            </li>

        </ul>
    </div>
</header>


<!-- fixed header -->
{{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">--}}
{{--<div class="container-fluid">--}}
{{--<div class="navbar-header">--}}
{{--<button class="navbar-toggle collapsed" type="button"--}}
{{--data-toggle="collapse" data-target="#collapse-header">--}}
{{--<span class="sr-only">Toggle navigation</span> <span--}}
{{--class="icon-bar"></span> <span class="icon-bar"></span> <span--}}
{{--class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="#">RunTime</a>--}}
{{--</div>--}}
{{--<div class="navbar-collapse collapse" role="navigation"--}}
{{--id="collapse-header">--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li><a href="{{ URL::to('/home') }}">主页</a></li>--}}
{{--<li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>--}}
{{--<li><a href="{{ URL::to('/health') }}">健康</a></li>--}}
{{--<li><a href="{{ URL::to('/activity') }}">活动</a></li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="/personal">个人设置</a></li>--}}
{{--<li role="separator" class="divider"></li>--}}
{{--<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>--}}
{{--</ul></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}



<!-- sidebar -->
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                搜索
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <input type="text" class="form-control" id="search" placeholder="">
                </div>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                文章
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/weibo') }}"><i class="icon-puzzle"></i> 最新文章</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/weibo/hot') }}"><i class="icon-fire"></i> 热门文章<span class="label label-danger">HOT</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/weibo/follow') }}"><i class="icon-energy"></i> 我的关注</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/weibo/collect') }}"><i class="icon-star"></i> 我的收藏 </a>
            </li>

            <li class="divider"></li>
            <li class="nav-title">
                标签
            </li>
            <li class="nav-item">
                <div>
                    <span class="label label-default">食谱</span>
                    <span class="label label-default">健身</span>
                    <span class="label label-default">健康建议</span>
                </div>
            </li>
        </ul>
    </nav>
</div>






<!-- main -->
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            {{--<div class="sidebar col-xs-2 col-sm-3 col-md-2 ">--}}
            {{--<ul class="nav nav-pills nav-stacked">--}}
            {{--<li role="presentation" class="active"><a--}}
            {{--href="{{ URL::to('/exercise') }}">我的运动</a></li>--}}
            {{--<li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>--}}
            {{--<li role="presentation"><a--}}
            {{--href="{{ URL::to('/exercise/history') }}">历史数据</a></li>--}}
            {{--<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>--}}
            {{--<li role="presentation"><a--}}
            {{--href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}

            <!-- main content -->
            @if($haveWeibo==0)
                <div class="col-md-12">
                    <div class="card card-local">
                        <div class="card-block">
                            暂无内容
                        </div>
                    </div>
                </div>
            @else
                @for($i=0;$i<count($weibos);$i++)
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="weibo-title" style="display:inline">
                                    {{ $weibos[$i]->title }}
                                </h4>

                                {{--<div class="btn-group pull-right">--}}
                                    {{--<button type="button" class="collect btn btn-success-outline btn-sm "--}}
                                            {{--id="c{{ $weibos[$i]->id }}">--}}
                                        {{--<i class="icon-star"></i>&nbsp;--}}
                                        {{--{{ $weibos[$i]->collect_count }}--}}

                                        {{--@if($collects[$i]==0)--}}
                                            {{--收藏--}}
                                        {{--@else--}}
                                            {{--已收藏--}}
                                        {{--@endif--}}
                                        {{--<i class="fa fa-star"></i>--}}

                                    {{--</button>--}}

                                {{--</div>--}}


                                @if($collects[$i]==0)
                                    <div class="btn-group pull-right">
                                        <button type="button" class="collect collect-no btn btn-sm"
                                                id="c{{ $weibos[$i]->id }}">
                                            <i class="icon-star"></i>&nbsp;
                                            {{ $weibos[$i]->collect_count }}
                                        </button>
                                    </div>
                                @else
                                    <div class="btn-group pull-right">
                                        <button type="button" class="collect collect-yes btn btn-sm"
                                                id="c{{ $weibos[$i]->id }}">
                                            <i class="icon-star"></i>&nbsp;
                                            {{ $weibos[$i]->collect_count }}
                                        </button>
                                    </div>
                                @endif

                            </div>

                            <div class="card-block">
                                <div class="weibo-content">
                                    {{ $weibos[$i]->content }}
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="weibo-author" style="display:inline">
                                    <span class="weibo-time" style="display:inline">
                                        <i class="icon-clock icons m-t-2"></i>
                                        {{--<i class="fa fa-clock-o  m-t-2"></i>--}}
                                    {{ $weibos[$i]->published_at }}
                                    </span>
                                    <span style="display:inline">
                                        <i class="icon-user icons m-t-2"></i>
                                        {{--<i class="fa fa-user  m-t-2"></i>--}}
                                        {{ $names[$i] }}
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;


                                    {{--<span class="btn-group">--}}
                                        {{--<button type="button" class="follow btn btn-info-outline btn-sm follow-{{ $weibos[$i]->author_id }}"--}}
                                                {{--id="{{ 'f'.$weibos[$i]->author_id }}">--}}
                                            {{--@if($follows[$i]==0)--}}
                                                {{--关注--}}
                                            {{--@else--}}
                                                {{--已关注--}}
                                            {{--@endif--}}
                                        {{--</button>--}}
                                    {{--</span>--}}

                                    @if($follows[$i]==0)
                                        <span class="btn-group">
                                        <button type="button" class="follow btn follow-no btn-sm follow-{{ $weibos[$i]->author_id }}"
                                                id="{{ 'f'.$weibos[$i]->author_id }}">
                                            关注
                                            &nbsp;<i class="icon-user-follow"></i>
                                        </button>
                                    </span>
                                    @else
                                        <span class="btn-group">
                                        <button type="button" class="follow btn follow-yes btn-sm follow-{{ $weibos[$i]->author_id }}"
                                                id="{{ 'f'.$weibos[$i]->author_id }}">
                                            已关注
                                            &nbsp;<i class="icon-user-following"></i>
                                        </button>
                                    </span>
                                    @endif

                                </div>

                                <div class="pull-right">
                                    <div class="weibo-label" style="display:inline;text-align:right;">
                                        @if($weibos[$i]->labels)
                                            @foreach($weibos[$i]->labels as $label)
                                                <span class="label label-default">{{ $label->name }}</span>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                @endfor
            @endif





            {{--<div class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">--}}

            {{--<div class="row">--}}
            {{--<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">--}}

            {{--@if($haveWeibo==0)--}}
            {{--<div>--}}
            {{--<p>暂无文章</p>--}}
            {{--</div>--}}
            {{--@else--}}
            {{--@for($i=0;$i<count($weibos);$i++)--}}

            {{--                    @foreach($weibos as $weibo)--}}
            {{--<article class="weibo">--}}
            {{--<div class="row weibo-head">--}}
            {{--<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">--}}
            {{--<div id="">{{ $weibos[$i]->title }}</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">--}}
            {{--<div class=""  style="text-align:right;">--}}
            {{--<div id="count-{{ $weibos[$i]->id }}" style="display:inline">{{ $weibos[$i]->collect_count }}</div>--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"--}}
            {{--aria-haspopup="true" aria-expanded="false" id="collect-{{ $weibos[$i]->id }}">--}}
            {{--@if($collects[$i]==0)--}}
            {{--收藏--}}
            {{--@else--}}
            {{--已收藏--}}
            {{--@endif--}}
            {{--<span class="caret"></span>--}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu">--}}
            {{--<li>--}}
            {{--<a class="collect" id="{{ 'c'.$weibos[$i]->id }}">--}}
            {{--@if($collects[$i]==0)--}}
            {{--收藏文章--}}
            {{--@else--}}
            {{--取消收藏--}}
            {{--@endif--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="weibo-time">--}}
            {{--<p>{{ $weibos[$i]->published_at }}</p>--}}
            {{--</div>--}}

            {{--<div class="weibo-content">--}}
            {{--<p>{{ $weibos[$i]->content }}</p>--}}
            {{--</div>--}}

            {{--<div class="row weibo-foot">--}}
            {{--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">--}}
            {{--<div class="weibo-author"style="display:inline">--}}
            {{--<div style="display:inline">{{ $names[$i] }}</div>--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-default btn-xs dropdown-toggle follow-{{ $weibos[$i]->author_id }}" data-toggle="dropdown"--}}
            {{--aria-haspopup="true" aria-expanded="false">--}}
            {{--@if($follows[$i]==0)--}}
            {{--关注--}}
            {{--@else--}}
            {{--已关注--}}
            {{--@endif--}}
            {{--<span class="caret"></span>--}}
            {{--</button>--}}
            {{--<ul class="dropdown-menu">--}}
            {{--<li>--}}
            {{--<a class="follow fmenu-{{ $weibos[$i]->author_id }}" id="{{ 'f'.$weibos[$i]->author_id }}">--}}
            {{--@if($follows[$i]==0)--}}
            {{--关注作者--}}
            {{--@else--}}
            {{--取消关注--}}
            {{--@endif--}}
            {{--</a>--}}

            {{--</li>--}}

            {{--</ul>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"style="text-align:right;">--}}
            {{--<div class="weibo-label" style="display:inline;text-align:right;">--}}
            {{--@if($weibos[$i]->labels)--}}
            {{--@foreach($weibos[$i]->labels as $label)--}}
            {{--<span class="label label-default">{{ $label->name }}</span>--}}
            {{--@endforeach--}}
            {{--@endif--}}

            {{--</div>--}}


            {{--</div>--}}

            {{--</div>--}}

            {{--</article>--}}

            {{--@endfor--}}
            {{--@endif--}}

            {{--</div>--}}

            {{--</div>--}}





            {{--</div>--}}

            {{--main content--}}

        </div>
    </div>
</main>



</body>

</html>
