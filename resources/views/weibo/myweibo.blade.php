
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
    {{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet"--}}
    {{--media="screen">--}}
    <link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
          media="screen">
    {{--<link href="{{ URL::asset('/') }}css/select2.min.css" rel="stylesheet"--}}
    {{--media="screen">--}}
    <link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet"
          media="screen">

    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/bootstrap.js"></script>

    <script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
    {{--<script type="text/javascript" src="{{ URL::asset('/') }}js/select2.full.min.js"></script>--}}


    <style>
        body {
            padding-top: 20px;
        }
        .weibo-title {
            font-family: "微软雅黑";
        }
    </style>

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
<!-- fixed header -->
<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ URL::to('/coach/export') }}">教练</a>
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

<!-- sidebar -->
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                建议
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/coach/export') }}"><i class="icon-puzzle"></i> 查看申请</a>

            </li>
            <li class="nav-title">
                文章
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::to('/weibo/myweibo') }}"><i class="icon-notebook"></i> 我的文章</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/weibo/create') }}"><i class="icon-pencil"></i> 发布文章</a>

            </li>
        </ul>
    </nav>
</div>



<!-- main -->
<main class="main">
    <div class="container-fluid">
        <div class="row">

            <!-- main content -->
            <div class="col-md-12">

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
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style="display:inline">
                                        <i class="icon-user icons m-t-2"></i>
                                        {{--<i class="fa fa-user  m-t-2"></i>--}}
                                        {{ $names[$i] }}
                                    </span>

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


            </div>

            <!-- main content -->
        </div>
    </div>
</main>





</body>

<!-- Bootstrap and necessary plugins -->
{{--<script src="assets/js/libs/jquery.min.js"></script>--}}
<script src="{{ URL::asset('/') }}assets/js/libs/tether.min.js"></script>
{{--<script src="assets/js/libs/bootstrap.min.js"></script>--}}
<script src="{{ URL::asset('/') }}js/libs/pace.min.js"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ URL::asset('/') }}js/libs/Chart.min.js"></script>
<script src="{{ URL::asset('/') }}js/views/shared.js"></script>
<!-- GenesisUI main scripts -->
<script src="{{ URL::asset('/') }}js/app.js"></script>
<!-- Plugins and scripts required by this views -->
<script src="{{ URL::asset('/') }}js/libs/jquery.maskedinput.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/select2.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/daterangepicker.min.js"></script>
<!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/forms.js"></script>
<script src="{{ URL::asset('/') }}js/app-options.js"></script>



</html>
