
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
    <link href="{{ URL::asset('/') }}css/bootstrap-datetimepicker.min.css"
          rel="stylesheet" media="screen">

    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/bootstrap.js"></script>
    <script src="{{ URL::asset('/') }}js/Chart.js"></script>
    <script type="text/javascript"
            src="{{ URL::asset('/') }}js/bootstrap-datetimepicker.js"></script>
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
            /*padding-top: 80px;*/
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
                <a class="nav-link" href="{{ URL::to('/home') }}">主页</a>
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
{{--<li><a href="{{ URL::to('/exercise') }}">运动</a></li>--}}
{{--<li class="active"><a href="{{ URL::to('/health') }}">健康</a></li>--}}
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
                运动
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/exercise') }}"><i class="icon-puzzle"></i> 我的运动</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/exercise/goal') }}"><i class="icon-energy"></i> 运动目标</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/exercise/history') }}"><i class="icon-docs"></i> 历史数据</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/exercise/chart') }}"><i class="icon-graph"></i> 图表展示</a>

            </li>
            <li class="divider"></li>
            <li class="nav-title">
                健康
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/health') }}"><i class="icon-puzzle"></i> 身体管理</a>

            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ URL::to('/health/sleep') }}"><i class="icon-speedometer"></i> 睡眠分析</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/health/rate') }}"><i class="icon-graph"></i> 心率分析</a>
            </li>

            <li class="divider"></li>
            <li class="nav-title">
                建议
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/exercise/suggestion') }}"><i class="icon-people"></i> 锻炼建议</a>
            </li>
        </ul>
    </nav>
</div>

<!-- main -->
<main class="main">
<div class="container-fluid">
    <div class="row">
        <!-- sidebar -->
        {{--<div class="sidebar col-xs-2 col-sm-3 col-md-2">--}}
            {{--<ul class="nav nav-pills nav-stacked">--}}
                {{--<li role="presentation"><a href="{{ URL::to('/health') }}">身体管理</a></li>--}}
                {{--<li role="presentation" class="active"><a--}}
                            {{--href="{{ URL::to('/health/sleep') }}">睡眠分析</a></li>--}}
                {{--<li role="presentation"><a href="{{ URL::to('/health/rate') }}">心率分析</a></li>--}}
                {{--<!-- <li role="presentation"><a--}}
						{{--href="{{ URL::to('/health/suggestion') }}">健康建议</a></li> -->--}}
            {{--</ul>--}}
        {{--</div>--}}
        <!-- main content -->
        <div
                class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">

            <div class="panel panel-default panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <b>近期睡眠曲线</b>
                </div>
                <div id="sleep" style="height: 400px"></div>
                <script src="/build/dist/echarts-all.js"></script>
                <script type="text/javascript">
                    // 基于准备好的dom，初始化echarts图表
                    var myChart = echarts.init(document.getElementById('sleep'));

                    var option = {

                        tooltip : {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['deep','light']
                        },
                        toolbox: {
                            show : true,
                            feature : {
                                mark : {show: true},
                                dataView : {show: true, readOnly: false},
                                restore : {show: true},
                                saveAsImage : {show: true}
                            }
                        },
                        calculable : true,
                        xAxis : [
                            {
                                type : 'category',
                                boundaryGap : false,
                                data : <?php echo json_encode($date)?>
                                }
                        ],
                        yAxis : [
                            {
                                type : 'value',
                                axisLabel : {
                                    formatter: '{value} 小时'
                                },

                            }
                        ],
                        series : [
                            {
                                name:'deep',
                                type:'line',
                                data:<?php echo json_encode($deep) ?>,
                                markPoint : {
                                    data : [
                                        {type : 'max', name: '最大值'},
                                        {type : 'min', name: '最小值'}
                                    ]
                                },

                            },
                            {
                                name:'light',
                                type:'line',
                                data:<?php echo json_encode($light) ?>,
                                markPoint : {
                                    data : [
                                        {type : 'max', name: '最大值'},
                                        {type : 'min', name: '最小值'}
                                    ]
                                },

                            },
                        ]
                    };
                    // 为echarts对象加载数据
                    myChart.setOption(option);

                </script>
            </div>


            <div class="panel panel-default panel-success">
                <div class="panel-heading">
                    <b>睡眠总时长曲线</b>
                </div>
                <div id="total" style="height: 400px"></div>
                <script src="../../echarts-2.2.7/build/dist/echarts-all.js"></script>
                <script type="text/javascript">
                    // 基于准备好的dom，初始化echarts图表
                    var myChart = echarts.init(document.getElementById('total'));

                    var option = {

                        tooltip : {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['total']
                        },
                        toolbox: {
                            show : true,
                            feature : {
                                mark : {show: true},
                                dataView : {show: true, readOnly: false},
                                restore : {show: true},
                                saveAsImage : {show: true}
                            }
                        },
                        calculable : true,
                        xAxis : [
                            {
                                type : 'category',
                                boundaryGap : false,
                                data : <?php echo json_encode($date)?>
                                }
                        ],
                        yAxis : [
                            {
                                type : 'value',
                                axisLabel : {
                                    formatter: '{value} 小时'
                                },

                            }
                        ],
                        series : [
                            {
                                name:'total',
                                type:'line',
                                data:<?php echo json_encode($total) ?>,
                                markPoint : {
                                    data : [
                                        {type : 'max', name: '最大值'},
                                        {type : 'min', name: '最小值'}
                                    ]
                                },

                            },
                        ]
                    };
                    // 为echarts对象加载数据
                    myChart.setOption(option);

                </script>
            </div>

            <div class="panel panel-default panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <b>详细睡眠信息</b>
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => '/health/sleep', 'class' =>
                    'form-inline', 'role' => 'form']) !!}
                    <div class="form-group">
                        <div class="input-group date form_date" data-date=""
                             data-date-format="yyyy-mm-dd" data-link-field="dtp_input2"
                             data-link-format="yyyy-mm-dd hh:ii">
                            <input name="date" class="form-control" size="16" type="text"
                                   value="" readonly> <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-remove"></span></span> <span
                                    class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">{!! Form::submit('搜索', ['class' => 'btn
							btn-success ']) !!}</div>
                    {!! Form::close() !!}

                    <br>

                    <table class="table table-hover">
                        <tr align=center style="font-weight: bold">
                            <td>深睡眠/hour</td>
                            <td>浅睡眠/hour</td>
                            <td>睡眠开始</td>
                            <td>睡眠结束</td>
                            <td>睡眠总时长/hour</td>
                            <td>清醒总时长/hour</td>
                        </tr>
                        @if (count($info)) @foreach ($info as $in)
                            <tr align=center>
                                <td>{{ round($in->deep/3600,1) }}</td>
                                <td>{{ round($in->light/3600,1) }}</td>
                                <td>{{ $in->start }}</td>
                                <td>{{ $in->end }}</td>
                                <td>{{ round($in->asleep/3600,1) }}</td>
                                <td>{{ round($in->awake/3600,1) }}</td>
                            </tr>
                        @endforeach @else
                            <h1>无睡眠数据</h1>
                        @endif
                    </table>

                </div>
            </div>


        </div>
    </div>
</div>
</main>


<script type="text/javascript">
    $('.form_datetime').datetimepicker({

        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({

        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({

        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>



</body>

</html>
