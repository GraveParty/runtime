
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

<script type="text/javascript"
	src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap.js"></script>

<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
	<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
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
					<a class="nav-link active" href="{{ URL::to('/health') }}"><i class="icon-puzzle"></i> 身体管理</a>

				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/health/sleep') }}"><i class="icon-speedometer"></i> 睡眠分析</a>
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
					{{--<li role="presentation" class="active"><a--}}
						{{--href="{{ URL::to('/health') }}">身体管理</a></li>--}}
					{{--<li role="presentation"><a href="{{ URL::to('/health/sleep') }}">睡眠分析</a></li>--}}
					{{--<li role="presentation"><a href="{{ URL::to('/health/rate') }}">心率分析</a></li>--}}
					{{--<!-- <li role="presentation"><a--}}
						{{--href="{{ URL::to('/health/suggestion') }}">健康建议</a></li> -->--}}
				{{--</ul>--}}
			{{--</div>--}}
			<!-- main content -->
			<div
				class="col-md-12">
				<div class="row">
					<div class="col-md-5">
						<div class="card card-local"style="height: 400px">
							<!-- Default panel contents -->
							<div class="card-header">
								<b>当前情况</b>
							</div>
							<div class="card-block">
								<p>当前身高：<?php echo $height ?>cm</p>
								<p>当前体重：<?php echo $weight ?>kg</p>
								<p>目标身高：<?php echo $goalheight ?>cm</p>
								<p>目标体重：<?php echo $goalweight ?>kg</p>

							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="card card-local "style="height: 400px">
							<!-- Default panel contents -->
							<div class="card-header">
								<b>当前BMI</b>
							</div>
							<div class="card-block">
							<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
							<div id="bmi" style="height: 300px"></div>
							<!-- ECharts单文件引入 -->
							<script src="{{ URL::asset('/') }}build/dist/echarts.js"></script>
							<script type="text/javascript">
        // 路径配置
        require.config({
            paths: {
                echarts: '/build/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/gauge'
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('bmi'), 'macarons'); 
                
                var option = {
                	    tooltip : {
                	        formatter: "{a} <br/>{b} : {c}%"
                	    },
                	    toolbox: {
                	        show : false,
                	        feature : {
                	            mark : {show: true},
                	            restore : {show: true},
                	            saveAsImage : {show: true}
                	        }
                	    },
                	    series : [
                	        {
                	            name:'个性化仪表盘',
                	            type:'gauge',
                	            center : ['50%', '50%'],    // 默认全局居中
                	            radius : [0, '75%'],
                	            startAngle: 140,
                	            endAngle : -140,
                	            min: 10,                     // 最小值
                	            max: 40,                   // 最大值
                	            precision: 2,               // 小数精度，默认为0，无小数点
                	            splitNumber: 30,             // 分割段数，默认为5
                	            axisLine: {            // 坐标轴线
                	                show: true,        // 默认显示，属性show控制显示与否
                	                lineStyle: {       // 属性lineStyle控制线条样式
                	                    color: [[0.28, 'skyblue'],[0.46, 'lightgreen'],[0.6, 'orange'],[1, '#ff4500']], 
                	                    width: 30
                	                }
                	            },
                	            axisTick: {            // 坐标轴小标记
                	                show: true,        // 属性show控制显示与否，默认不显示
                	                interval:0,
                	                splitNumber: 2,    // 每份split细分多少段
                	                length :8,         // 属性length控制线长
                	                lineStyle: {       // 属性lineStyle控制线条样式
                	                    color: '#eee',
                	                    width: 1,
                	                    type: 'solid'
                	                }
                	            },
                	            axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
                	                show: true,
                	                interval:0,
                	                formatter: function(v){
                	                    switch (v+''){
                	                        case '13': return '偏轻';
                	                        case '21': return '健康';
                	                        case '26': return '超重';
                	                        case '32': return '肥胖';
                	                        default: return '';
                	                    }
                	                },
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: '#333'
                	                }
                	            },
                	            splitLine: {           // 分隔线
                	                show: true,        // 默认显示，属性show控制显示与否
                	                length :30,         // 属性length控制线长
                	                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
                	                    color: '#eee',
                	                    width: 2,
                	                    type: 'solid'
                	                }
                	            },
                	            pointer : {
                	                length : '70%',
                	                width : 8,
                	                color : 'auto'
                	            },
                	            title : {
                	                show : true,
                	                offsetCenter: ['-65%', -10],       // x, y，单位px
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: '#333',
                	                    fontSize : 15
                	                }
                	            },
                	            detail : {
                	                show : true,
                	                backgroundColor: 'rgba(0,0,0,0)',
                	                borderWidth: 0,
                	                borderColor: '#ccc',
                	                width: 100,
                	                height: 40,
                	                offsetCenter: ['-60%', 10],       // x, y，单位px
                	                formatter:'{value}',
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: 'auto',
                	                    fontSize : 30
                	                }
                	            },
                	            data:[{value: <?php echo $bmi ?>, name: 'BMI'}]
                	        }
                	    ]
                	};
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>
							
							
							
								
								

							</div>
						</div>
					</div>
				</div>




				<div class="card card-local">
					<!-- Default panel contents -->
					<div class="card-header">
						<b>体重变化</b>
					</div>
					<div class="card-block">



						<div id="weightchange" style="height: 400px"></div>
						<script src="/build/dist/echarts-all.js"></script>
						<script type="text/javascript">
                    // 基于准备好的dom，初始化echarts图表
                    var myChart = echarts.init(document.getElementById('weightchange'));

                    var option = {

                        tooltip : {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['体重']
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
                                data : <?php echo json_encode($dates)?>
                                }
                        ],
                        yAxis : [
                            {
                                type : 'value',
                                axisLabel : {
                                    formatter: '{value} kg'
                                },

                            }
                        ],
                        series : [
                            {
                                name:'体重',
                                type:'line',
                                data:<?php echo json_encode($weights) ?>,
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
				</div>


				<div class="card card-local">
					<!-- Default panel contents -->
					<div class="card-header">
						<b>目标设置</b> <a href="javascript:form.submit();" type="button"
							class="btn btn-sm btn-success pull-right">
							<i class="fa fa-magic"></i>保存
						</a>
					</div>

					<div class="card-block">
						<form name="form" class="form-horizontal" method="POST"
							action="/health">

							{!! csrf_field() !!}
							<div class="form-group row">
								<label for="inputHeight" class="col-md-1 col-md-offset-1 form-control-label">身高</label>

								<div class="col-md-10">
									<div class="input-group">
										<input name="height" type="text" class="form-control"
											id="inputHeight" placeholder="请输入目标身高"
											aria-label="Amount (to the nearest dollar)"><span
											class="input-group-addon">cm</span>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputWeight" class="col-md-1 col-md-offset-1 form-control-label">体重</label>

								<div class="col-md-10">
									<div class="input-group">
										<input name="weight" type="text" class="form-control"
											id="inputWeight" placeholder="请输入目标体重"
											aria-label="Amount (to the nearest dollar)"> <span
											class="input-group-addon">kg</span>
									</div>

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
		</div>
	</div>
	</main>




</body>

</html>
