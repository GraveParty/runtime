
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

	<script type="text/javascript" src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('/') }}js/bootstrap.js"></script>

	<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>



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
				运动
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ URL::to('/exercise') }}"><i class="icon-puzzle"></i> 我的运动</a>

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
			<div class="col-md-12">
				<div class="row">

					<div class="col-md-4">
						<div class="card card-inverse card-success">
							<div class="card-block">
								<div class="h1 text-muted text-xs-right m-b-2">
									<i class="icon-calendar"></i>
								</div>
								<div class="h4 m-b-0"><?php echo $days ?></div>
								<small class="text-muted text-uppercase font-weight-bold">已运动天数</small>
								<progress class="progress progress-xs progress-success m-t-1 m-b-0" value="55" max="100"></progress>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card  card-inverse card-success">
							<div class="card-block">
								<div class="h1 text-muted text-xs-right m-b-2">
									<i class="icon-fire"></i>
								</div>
								<div class="h4 m-b-0"><?php echo $calories ?></div>
								<small class="text-muted text-uppercase font-weight-bold">消耗卡路里</small>
								<progress class="progress progress-xs progress-success m-t-1 m-b-0" value="75" max="100"></progress>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card  card-inverse card-success">
							<div class="card-block">
								<div class="h1 text-muted text-xs-right m-b-2">
									<i class="icon-compass"></i>
								</div>
								<div class="h4 m-b-0"><?php echo $km ?></div>
								<small class="text-muted text-uppercase font-weight-bold">累计里程公里数</small>
								<progress class="progress progress-xs progress-success m-t-1 m-b-0" value="45" max="100"></progress>
							</div>
						</div>
					</div>







					<div class="col-md-9">

						<div class="card card-local">
							<!-- Default panel contents -->
							<div class="card-header">
								<b>本月运动情况</b>
							</div>
							<div class="card-block">

								<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
								<div id="goal" style="height: 360px"></div>
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
												var myChart = ec.init(document.getElementById('goal'), 'macarons');

												var option = {
													tooltip : {
														formatter: "{a} <br/>{b} : {c}%"
													},
													toolbox: {
														show : true,
														feature : {
															mark : {show: false},
															restore : {show: true},
															saveAsImage : {show: true}
														}
													},
													series : [
														{
															name:'业务指标',
															type:'gauge',
															startAngle: 180,
															endAngle: 0,
															center : ['50%', '90%'],    // 默认全局居中
															radius : 320,
															axisLine: {            // 坐标轴线
																lineStyle: {       // 属性lineStyle控制线条样式
																	width: 200
																}
															},
															axisTick: {            // 坐标轴小标记
																splitNumber: 10,   // 每份split细分多少段
																length :12,        // 属性length控制线长
															},
															axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
																formatter: function(v){
																	switch (v+''){
																		case '25': return '低';
																		case '50': return '中';
																		case '75': return '高';
																		default: return '';
																	}
																},
																textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
																	color: '#fff',
																	fontSize: 15,
																	fontWeight: 'bolder'
																}
															},
															pointer: {
																width:40,
																length: '90%',
																color: 'rgba(255, 255, 255, 0.8)'
															},
															title : {
																show : true,
																offsetCenter: [0, '-60%'],       // x, y，单位px
																textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
																	color: '#fff',
																	fontSize: 26
																}
															},
															detail : {
																show : true,
																backgroundColor: 'rgba(0,0,0,0)',
																borderWidth: 0,
																borderColor: '#ccc',
																width: 100,
																height: 40,
																offsetCenter: [0, -40],       // x, y，单位px
																formatter:'{value}%',
																textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
																	fontSize : 50
																}
															},
															data:[{
																value:  <?php echo $percent ?>,
																name: '运动目标完成',

															}]
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

						<!--
			</div>
			<hr />
			<div class="caption">
				<h3>在RunTime的运动总量</h3>
			</div>
			<br>
			<div class="col-xs-4 col-sm-4 col-md-4">
				<a href="#" class="img-circle"> <img src="image/time_green.png"
													 alt="天">
				</a>
				已运动<?php echo $days ?>天
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4">
				<a href="#" class="img-circle"> <img src="image/burn_green.png"
													 alt="大卡">
				</a>
				共燃烧<?php echo $calories ?>大卡
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4">
				<a href="#" class="img-circle"> <img src="image/run_green.png"
													 alt="公里">
				</a>
				累积里程<?php echo $km ?>公里
			</div>
			<hr />

			-->


					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-block text-xs-center">
								<div class="text-muted small text-uppercase font-weight-bold">月目标步数</div>
								<div class="h2 p-y-1"><?php echo $goalstep ?></div>
								<progress class="progress progress-xs progress-success" value="<?php echo $percent ?>" max="100"></progress>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card">
							<div class="card-header">
								<b>修改目标</b>
								<div class="card-actions">
									<a class="btn-minimize collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
								</div>
							</div>
							<div class="card-block collapse text-xs-center" id="collapseExample">
								<div class="text-muted small text-uppercase font-weight-bold">新目标步数</div>

								<br>

								<form name="form" class="form-horizontal" method="POST" action="/exercise/goal">
									{!! csrf_field() !!}
									<div class="form-group row">
										<input name="step" type="text" class=" form-control" id="inputStep"
											   placeholder="请输入目标步数" value="{{ old('step') }}">
									</div>
									<div class="form-group">
										<a href="javascript:form.submit();" type="button" class="btn btn-sm btn-success">
											<i class="fa fa-magic"></i> 保存
										</a>
									</div>
								</form>
							</div>
						</div>

					</div>


				</div>
			</div>
		</div>
</main>


</body>

<script src="{{ URL::asset('/') }}js/libs/tether.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/pace.min.js"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ URL::asset('/') }}js/views/shared.js"></script>
<!-- GenesisUI main scripts -->
<script src="{{ URL::asset('/') }}js/app.js"></script>
<!-- Plugins and scripts required by this views -->
{{--<script src="{{ URL::asset('/') }}js/libs/toastr.min.js"></script>--}}
<script src="{{ URL::asset('/') }}js/libs/jquery.maskedinput.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/Chart.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/select2.min.js"></script>
<!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/forms.js"></script>
<script src="{{ URL::asset('/') }}js/app-options.js"></script>
<script src="{{ URL::asset('/') }}js/views/widgets.js"></script>




</html>
