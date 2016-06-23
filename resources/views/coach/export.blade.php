
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
					<li class="active"><a href="{{ URL::to('/coach') }}">教练</a></li>
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
					<li role="presentation"><a
						href="{{ URL::to('/coach') }}">导入建议</a></li>
					<li role="presentation" class="active"><a href="{{ URL::to('/coach/export') }}">查看申请</a></li>
				</ul>
			</div>
			<!-- sidebar -->

			<!-- main content -->
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">

				<div class="panel panel-default panel-success">
					<!-- Default panel contents -->
					<div class="panel-heading">
						<b>申请用户</b>
					</div>
					<div class="panel-body">

						<table class="table">
							<tr>
								<th>用户ID</th>
								<th>用户昵称</th>
								<th>BMI</th>
								<th>体脂率</th>
								<th>平均心率</th>
							</tr>
							@if(count($ids)>0)
							@for($i=0;$i < count($ids);$i++)
							
							<tr>
								<td><?php echo $ids[$i] ?></td>
								<td><?php echo $nicknames[$i] ?></td>
								<td><?php echo round($bmis[$i],2) ?></td>
								<td><?php echo $bodyfats[$i] ?></td>
								<td><?php echo round($rates[$i],2) ?></td>
							</tr>
							@endfor
							@endif
						</table>

					</div>
				</div>




			</div>
			<!-- main content -->
		</div>
	</div>



</body>

</html>
