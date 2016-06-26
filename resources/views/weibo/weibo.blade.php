
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
    <link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet"
          media="screen">
    <link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
          media="screen">

    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/bootstrap.js"></script>

    <script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}js/weibo.js"></script>


    <style>
        body {
            padding-top: 80px;
        }
    </style>

</head>

<body>
<!-- fixed header -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button"
                    data-toggle="collapse" data-target="#collapse-header">
                <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">RunTime</a>
        </div>
        <div class="navbar-collapse collapse" role="navigation"
             id="collapse-header">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/home') }}">主页</a></li>
                <li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>
                <li><a href="{{ URL::to('/health') }}">健康</a></li>
                <li><a href="{{ URL::to('/activity') }}">活动</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/personal">个人设置</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ URL::to('/logout') }}">退出登录</a></li>
                    </ul></li>
            </ul>
        </div>
    </div>
</nav>

<!-- main -->
<div class="container-fluid">
    <div class="row">
        <!-- sidebar -->
        <div class="sidebar col-xs-2 col-sm-3 col-md-2 ">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a
                            href="{{ URL::to('/exercise') }}">我的运动</a></li>
                <li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>
                <li role="presentation"><a
                            href="{{ URL::to('/exercise/history') }}">历史数据</a></li>
                <li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>
                <li role="presentation"><a
                            href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>
            </ul>
        </div>


        <!-- main content -->
        <div class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">

            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">


                    {{--<article class="weibo">--}}
                        {{--<div class="row weibo-head">--}}
                            {{--<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">--}}
                                {{--<div id="">为什么不能在 EDM 模版中使用 DIV ？</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">--}}
                                {{--<div class=""  style="text-align:right;">--}}
                                    {{--<div style="display:inline">155</div>--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--已收藏 <span class="caret"></span>--}}
                                        {{--</button>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="#">取消收藏</a></li>--}}

                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="weibo-time">--}}
                            {{--<p>2016.06.24 21:18</p>--}}
                        {{--</div>--}}

                        {{--<div class="weibo-content">--}}
                            {{--<p>CSS只可使用 内联样式表 ，如：style="margin:0;"</p>--}}
                            {{--<p>设计之初遵循： 图上无文本，文本后无底纹 的规则</p>--}}
                            {{--<p>使用 MailChimp HTML Email CSS Fix 参看下文链接</p>--}}
                            {{--<p>引入 CSS Reset for HTML Email 参看下文链接</p>--}}
                        {{--</div>--}}

                        {{--<div class="row weibo-foot">--}}
                            {{--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">--}}
                                {{--<div class="weibo-author"style="display:inline">--}}
                                    {{--<div style="display:inline">王小明</div>--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--已关注 <span class="caret"></span>--}}
                                        {{--</button>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="#">取消关注</a></li>--}}

                                        {{--</ul>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"style="text-align:right;">--}}
                                {{--<div class="weibo-label" style="display:inline;text-align:right;">--}}
                                    {{--<span class="label label-default">食谱</span>--}}
                                    {{--<span class="label label-default">健身</span>--}}
                                    {{--<span class="label label-default">健康建议</span>--}}
                                {{--</div>--}}


                            {{--</div>--}}

                        {{--</div>--}}

                    {{--</article>--}}


                    @for($i=0;$i<count($weibos);$i++)

{{--                    @foreach($weibos as $weibo)--}}
                        <article class="weibo">
                            <div class="row weibo-head">
                                <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                    <div id="">{{ $weibos[$i]->title }}</div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                                    <div class=""  style="text-align:right;">
                                        <div style="display:inline">{{ $weibos[$i]->collect_count }}</div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" id="collect-{{ $weibos[$i]->id }}">
                                                    @if($collects[$i]==0)
                                                        收藏
                                                    @else
                                                        已收藏
                                                    @endif
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        @if($collects[$i]==0)
                                                            <a class="confirmcollect" id="{{ 'c'.$weibos[$i]->id }}">收藏文章</a>
                                                        @else
                                                            <a class="cancelcollect" id="{{ 'c'.$weibos[$i]->id }}">取消收藏</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="weibo-time">
                                <p>{{ $weibos[$i]->published_at }}</p>
                            </div>

                            <div class="weibo-content">
                                <p>{{ $weibos[$i]->content }}</p>
                            </div>

                            <div class="row weibo-foot">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <div class="weibo-author"style="display:inline">
                                        <div style="display:inline">{{ $names[$i] }}</div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" id="follow-{{ $weibos[$i]->author_id }}">
                                                    @if($follows[$i]==0)
                                                    关注
                                                    @else
                                                    已关注
                                                    @endif
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        @if($follows[$i]==0)
                                                            <a class="confirmfollow" id="{{ 'f'.$weibos[$i]->author_id }}">关注作者</a>
                                                        @else
                                                            <a class="cancelfollow" id="{{ 'f'.$weibos[$i]->author_id }}">取消关注</a>
                                                        @endif
                                                    </li>

                                                </ul>
                                            </div>

                                    </div>
                                </div>

                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"style="text-align:right;">
                                    <div class="weibo-label" style="display:inline;text-align:right;">
                                        @if($weibos[$i]->labels)
                                            @foreach($weibos[$i]->labels as $label)
                                                <span class="label label-default">{{ $label->name }}</span>
                                            @endforeach
                                        @endif

                                    </div>


                                </div>

                            </div>

                        </article>

                    @endfor

                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                    <div class="search-box">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"aria-hidden="true"></span>
                                {{--<span class="glyphicon glyphicon-remove-circle form-control-feedback" style="display:inline-block;"></span>--}}

                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>

                    <div class="weibo-menu">
                        <p><a href="{{ URL::to('/weibo') }}">最新文章</a></p>
                        <p><a href="{{ URL::to('/weibo/hot') }}">热门文章</a></p>
                        <p><a href="{{ URL::to('/weibo') }}">我的关注</a></p>
                        <p><a href="{{ URL::to('/weibo') }}">我的收藏</a></p>

                    </div>

                    <div class="weibo-label">
                        <h4>标签</h4>
                        <div>
                            <span class="label label-default">食谱</span>
                            <span class="label label-default">健身</span>
                            <span class="label label-default">健康建议</span>
                        </div>




                    </div>


                </div>


            </div>





        </div>

        {{--main content--}}

    </div>
</div>



</body>

</html>
