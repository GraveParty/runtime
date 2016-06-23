
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
<link href="{{ URL::asset('/') }}css/bootstrap-datetimepicker.min.css"
	rel="stylesheet" media="screen">

<script type="text/javascript"
	src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap.js"></script>

<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>

<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap-datetimepicker.js"></script>


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
					<li><a href="activity.html">活动</a></li>
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
                    <li role="presentation" class="active"><a href="{{ URL::to('/exercise/history') }}">历史数据</a></li>
                    <li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>
                    <li role="presentation"><a href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>
                </ul>
            </div>
			<!-- main content -->
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">
					<div>
					
					<form name="form" class="form-inline" method="POST" action="/exercise/history">
					{!! csrf_field() !!}
					
					<div class="form-group">
					<div class="col-sm-8 col-md-6 col-lg-8">
							
								<input name="date" type="text" readonly class="form-control input-append date form_datetime"
									id="inputDate" placeholder="" value="2015-12">
									
									<span class="add-on"><i class="icon-remove"></i></span>
    <span class="add-on"><i class="icon-calendar"></i></span>
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
					
					<div class="form-group">
					<button type="submit" class="btn btn-default btn-xs btn-success"> 
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>选择年份</button>
					
					
					</div>
					
					</form>
					
					
					</div>
					
					<br>
					
					<div>
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


			<!-- main content -->
		</div>
	</div>



</body>

</html>
