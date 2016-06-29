
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
	<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
	{{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet" media="screen">--}}
	<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
		  media="screen">
	<link href="{{ URL::asset('/') }}css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">


	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap.js"></script>

	<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>
	<script type="text/javascript" src="{{ URL::asset('/') }}js/echart.js"></script>

	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap-datetimepicker.js"></script>


	<style>
		body {
			padding-top: 20px;
		}

		#inputDate{
			background-color: transparent;
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
{{--<li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>--}}
{{--<li><a href="{{ URL::to('/health') }}">健康</a></li>--}}
{{--<li><a href="activity.html">活动</a></li>--}}
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
				<a class="nav-link" href="{{ URL::to('/exercise/history') }}"><i class="icon-docs"></i> 历史数据</a>

			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ URL::to('/exercise/chart') }}"><i class="icon-graph"></i> 图表展示</a>

			</li>
			<li class="divider"></li>
			<li class="nav-title">
				健康
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health') }}"><i class="icon-puzzle"></i> 身体管理</a>

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
			{{--<div class="sidebar col-xs-2 col-sm-3 col-md-2 ">--}}
			{{--<ul class="nav nav-pills nav-stacked">--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise') }}">我的运动</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>--}}
			{{--<li role="presentation"><a--}}
			{{--href="{{ URL::to('/exercise/history') }}">历史数据</a></li>--}}
			{{--<li role="presentation" class="active"><a--}}
			{{--href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>--}}
			{{--<li role="presentation"><a--}}
			{{--href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>--}}
			{{--</ul>--}}
			{{--</div>--}}
			<!-- main content -->
			<div
					class="col-md-12">

				<div class="card card-local">
					<div class="card-block p-a-1 clearfix row">

						<form name="form" class="form-inline" method="POST"
							  action="/exercise/chart">
							{!! csrf_field() !!}

							<div class="form-group col-md-3 col-md-offset-4">
								<div class="">

									<input name="date" type="text" readonly
										   class="form-control input-append date form_datetime"
										   id="inputDate" placeholder="" value="2015" data-date="2015">
									<script type="text/javascript">
										$(".form_datetime").datetimepicker({
											format: 'yyyy',
											autoclose: true,
											todayBtn: true,
											minView: 'year',
											pickerPosition: "bottom-left"

										});
									</script>

								</div>

							</div>
							<div class="form-group col-md-1">
								<button type="submit" class="btn btn-default btn-xs btn-success">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>提交
								</button>


							</div>

						</form>

					</div>
				</div>


				<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
				<div class="card card-local">
					<div class="card-header">
						<b>运动步数</b>
					</div>
					<div class="card-blocl" id="main" style="height: 400px"></div>
				</div>
				<div class="card card-local">
					<div class="card-header">
						<b>运动距离</b>
					</div>
					<div class="card-blocl" id="km" style="height: 400px"></div>
				</div>
				<div class="card card-local">
					<div class="card-header">
						<b>运动步数</b>
					</div>
					<div class="card-blocl" id="calory" style="height: 400px"></div>
				</div>



			</div>

		</div>


		<!-- main content -->
	</div>
	</div>
</main>

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
				'echarts/chart/bar', // 使用柱状图就加载bar模块，按需加载
				'echarts/chart/line'
			],
			function (ec) {
				// 基于准备好的dom，初始化echarts图表
				var myChart = ec.init(document.getElementById('main'));

				var option = {
					title : {
						text: '',
						subtext: ''
					},
					tooltip : {
						trigger: 'axis'
					},
					legend: {
						data:['运动总步数']
					},
					toolbox: {
						show : true,
						feature : {
							mark : {show: false},
							dataView : {show: false, readOnly: false},
							magicType : {show: true, type: ['line', 'bar']},
							restore : {show: true},
							saveAsImage : {show: true}
						}
					},
					calculable : true,
					xAxis : [
						{
							type : 'category',
							data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
						}
					],
					yAxis : [
						{
							type : 'value',
							axisLabel : {
								formatter: '{value} 步'
							},
						}
					],
					series : [
						{
							name:'运动总步数',
							type:'bar',
							itemStyle:{
								normal:{
									color:'#3cb371'
								},
							},
							data:[<?php echo $steps ?>],

							markPoint : {
								data : [
									{type : 'max', name: '最大值'},
									{type : 'min', name: '最小值'}
								]
							},
							markLine : {
								data : [
									{type : 'average', name: '平均值'}
								]
							}
						},


					]
				};

				// 为echarts对象加载数据
				myChart.setOption(option);
			}
	);
</script>


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
				'echarts/chart/bar', // 使用柱状图就加载bar模块，按需加载
				'echarts/chart/line'
			],
			function (ec) {
				// 基于准备好的dom，初始化echarts图表
				var myChart = ec.init(document.getElementById('km'));

				var option = {
					title : {
						text: '',
						subtext: ''
					},
					tooltip : {
						trigger: 'axis'
					},
					legend: {
						data:['运动总距离']
					},
					toolbox: {
						show : true,
						feature : {
							mark : {show: false},
							dataView : {show: false, readOnly: false},
							magicType : {show: true, type: ['line', 'bar']},
							restore : {show: true},
							saveAsImage : {show: true}
						}
					},
					calculable : true,
					xAxis : [
						{
							type : 'category',
							data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
						}
					],
					yAxis : [
						{
							type : 'value',
							axisLabel : {
								formatter: '{value} km'
							},
						}
					],
					series : [

						{
							name:'运动总距离',
							type:'bar',
							itemStyle:{
								normal:{
									color:'#87cefa'
								},
							},
							data:[<?php echo $kms ?>],
							markPoint : {
								data : [
									{type : 'max', name: '最大值'},
									{type : 'min', name: '最小值'}
								]
							},
							markLine : {
								data : [
									{type : 'average', name : '平均值'}
								]
							}
						},

					]
				};

				// 为echarts对象加载数据
				myChart.setOption(option);
			}
	);
</script>


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
				'echarts/chart/bar', // 使用柱状图就加载bar模块，按需加载
				'echarts/chart/line'
			],
			function (ec) {
				// 基于准备好的dom，初始化echarts图表
				var myChart = ec.init(document.getElementById('calory'));

				var option = {
					title : {
						text: '',
						subtext: ''
					},
					tooltip : {
						trigger: 'axis'
					},
					legend: {
						data:['消耗卡路里']
					},
					toolbox: {
						show : true,
						feature : {
							mark : {show: false},
							dataView : {show: false, readOnly: false},
							magicType : {show: true, type: ['line', 'bar']},
							restore : {show: true},
							saveAsImage : {show: true}
						}
					},
					calculable : true,
					xAxis : [
						{
							type : 'category',
							data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
						}
					],
					yAxis : [
						{
							type : 'value',
							axisLabel : {
								formatter: '{value} 千卡'
							},
						}
					],
					series : [
						{
							name:'消耗卡路里',
							type:'bar',
							itemStyle:{
								normal:{
									color:'#ff7f50'
								},
							},
							data:[<?php echo $calories ?>],
							markPoint : {
								data : [
									{type : 'max', name: '最大值'},
									{type : 'min', name: '最小值'}
								]
							},
							markLine : {
								data : [
									{type : 'average', name : '平均值'}
								]
							}
						},
					]
				};

				// 为echarts对象加载数据
				myChart.setOption(option);
			}
	);
</script>



</body>

<!-- Bootstrap and necessary plugins -->
{{--<script src="assets/js/libs/jquery.min.js"></script>--}}
<script src="{{ URL::asset('/') }}js/libs/tether.min.js"></script>
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
