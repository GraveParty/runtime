
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
    <link href="{{ URL::asset('/') }}css/select2.min.css" rel="stylesheet"
          media="screen">

    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/bootstrap.js"></script>

    <script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}js/select2.full.min.js"></script>


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
                <li role="presentation"><a href="{{ URL::to('/exercise') }}">我的运动</a></li>
                <li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>
                <li role="presentation"><a
                            href="{{ URL::to('/exercise/history') }}">历史数据</a></li>
                <li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>
                <li role="presentation" class="active"><a
                            href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>
            </ul>
        </div>
        <!-- main content -->
        <div
                class="col-xs-9 col-sm-9 col-md-9 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
            <div class="row">

                <h3>撰写新文章</h3>

                <form class="form-horizontal" method="POST" action="/weibo/create">
                    {!! csrf_field() !!}


                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-1 control-label">标题</label>

                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <input name="title" type="text" class="form-control"
                                   id="inputTitle" placeholder=""
                                   value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="col-sm-1 control-label">内容</label>

                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <textarea name="content" class="form-control" id="inputContent" rows="12"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputTitle" class="col-sm-1 control-label">标签</label>

                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <select name="label_list[]" class="form-control js-example-basic-multiple"
                                    id="inputLabel" multiple="multiple">
                                @foreach($labels as $l)
                                <option value="<?php echo $l->id ?>"><?php echo $l->name ?></option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-1">
                            <button type="submit" class="btn btn-default">提交</button>
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

        <!-- main content -->
    </div>
</div>


<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            placeholder: "添加标签"
        });
    });
</script>


</body>

</html>
