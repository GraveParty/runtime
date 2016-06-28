
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
                建议
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/coach/export') }}"><i class="icon-puzzle"></i> 查看申请</a>

            </li>
            <li class="nav-title">
                文章
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/weibo/myweibo') }}"><i class="icon-notebook"></i> 我的文章</a>

            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::to('/weibo/create') }}"><i class="icon-pencil"></i> 发布文章</a>

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
            {{--<li role="presentation"><a href="{{ URL::to('/exercise') }}">我的运动</a></li>--}}
            {{--<li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>--}}
            {{--<li role="presentation"><a--}}
            {{--href="{{ URL::to('/exercise/history') }}">历史数据</a></li>--}}
            {{--<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>--}}
            {{--<li role="presentation" class="active"><a--}}
            {{--href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}

            <!-- main content -->
            <div class="col-md-12">
                <div class="card card-local">
                    <div class="card-header">
                        <b>撰写新文章</b>

                    </div>
                    <div class="card-block">
                        <form class="form-horizontal" method="POST" action="/weibo/create">
                            {!! csrf_field() !!}


                            <div class="form-group row">
                                <label for="inputTitle" class="col-md-1 col-md-offset-1 control-label">标题</label>

                                <div class="col-md-9">
                                    <input name="title" type="text" class="form-control"
                                           id="inputTitle" placeholder=""
                                           value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputContent" class="col-md-1 col-md-offset-1 control-label">内容</label>

                                <div class="col-md-9">
                                    <textarea name="content" class="form-control" id="inputContent" rows="12"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputTitle" class="col-md-1 col-md-offset-1 control-label">标签</label>

                                <div class="col-md-9">
                                    <select name="label_list[]" class="form-control js-example-basic-multiple"
                                            id="inputLabel" multiple="multiple" placeholder>
                                        @foreach($labels as $l)
                                            <option value="<?php echo $l->id ?>"><?php echo $l->name ?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 col-md-offset-2">
                                    <button type="submit" class="btn btn-block btn-success">提交</button>
                                </div>
                            </div>
                        </form>


                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li> @endforeach
                            </ul>
                        @endif


                    </div>


                </div>

            </div>

            <!-- main content -->
        </div>
    </div>
</main>


<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            placeholder: "添加标签",
        });
    });
</script>


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
