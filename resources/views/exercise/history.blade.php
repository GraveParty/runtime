
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
	<link href="{{ URL::asset('/') }}css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">

	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap.js"></script>

	<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>

	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap-datetimepicker.js"></script>


	<style>
		body {
			/*padding-top: 80px;*/
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
				<a class="nav-link" href="{{ URL::to('/exercise/goal') }}"><i class="icon-energy"></i> 运动目标</a>

			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ URL::to('/exercise/history') }}"><i class="icon-docs"></i> 历史数据</a>

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
			{{--<li role="presentation"><a href="{{ URL::to('/exercise') }}">我的运动</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>--}}
			{{--<li role="presentation" class="active"><a href="{{ URL::to('/exercise/history') }}">历史数据</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>--}}
			{{--</ul>--}}
			{{--</div>--}}
			<!-- main content -->
			<div
					class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="card card-local">
						<div class="card-block p-a-1 clearfix row">

							<form name="form" class="form-inline" method="POST" action="/exercise/history">
								{!! csrf_field() !!}

								<div class="form-group col-md-3 col-md-offset-4">
									<div class="">

										<input name="date" type="text" readonly class="form-control input-append date form_datetime"
											   id="inputDate" placeholder="" value="2015-12">

										<script type="text/javascript">
											$(".form_datetime").datetimepicker({
												format: 'yyyy-mm',
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
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>选择月份</button>


								</div>

							</form>
						</div>
					</div>


				</div>

				<br>

				<div class="card card-local">
					<div class="card-header">
						<b>历史数据</b>
					</div>

					<div class="card-block">
						<table class="table">
							<tr>
								<th>日期</th>
								<th>运动步数</th>
								<th>运动距离（km）</th>
								<th>消耗卡路里（千卡）</th>
							</tr>
							@if(count($datas)>0)
								@foreach ($datas as $d)
									<tr>
										<td><?php echo $d->date ?></td>
										<td><?php echo $d->step ?></td>
										<td><?php echo $d->km ?></td>
										<td><?php echo $d->calory ?></td>
									</tr>
								@endforeach
							@endif
						</table>
					</div>
				</div>

			</div>

		</div>


		<!-- main content -->
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
<script src="{{ URL::asset('/') }}js/libs/gauge.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/main.js"></script>

</html>
