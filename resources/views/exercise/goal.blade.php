
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
					<li><a href="{{ URL::to('/home') }}">主页</a></li>
					<li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>
					<li><a href="{{ URL::to('/health') }}">健康</a></li>
					<li><a href="{{ URL::to('/activity') }}">活动</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
						role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>
						<ul class="dropdown-menu">
                            <li>
                                <a href="/personal">个人设置</a>
                            </li>
                            <li role="separator" class="divider">
                            </li>
                            <li>
                                <a href="{{ URL::to('/logout') }}">退出登录</a>
                            </li>
                        </ul>
					</li>
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
                    <li role="presentation" class="active"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>
                    <li role="presentation"><a href="{{ URL::to('/exercise/history') }}">历史数据</a></li>
                    <li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>
                    <li role="presentation"><a href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>
                </ul>
            </div>
            <!-- main content -->
            <div class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                <div class="row">
                    <div class="panel panel-default panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <b>月目标</b>
                    </div>
                    <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/login">

					{!! csrf_field() !!}
					<div class="form-group">
						<label for="inputID" class="col-sm-2 control-label">步数</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
							<p class="form-control-static"><?php echo $goalstep ?>步</p>
						</div>
					</div>
				</form>

				</div>
                </div>
               	<br>
                <hr/>
                <br>
                <div class="panel panel-default panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <b>目标设置</b>
                        <a href="javascript:form.submit();" type="button" class="btn btn-default btn-xs btn-success pull-right">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 保存
                        </a>
                    </div>
                    
                    <div class="panel-body">
                    <form name="form" class="form-horizontal" method="POST" action="/exercise/goal">

					{!! csrf_field() !!}
					<div class="form-group">
						<label for="inputStep" class="col-sm-2 control-label">步数</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
							<input name="step" type="text" class="form-control" id="inputStep"
								placeholder="请输入目标步数" value="{{ old('step') }}">
						</div>
					</div>
<!-- 					<div class="form-group"> -->
<!-- 						<div class="col-sm-offset-2 col-sm-10"> -->
<!-- 							<button type="submit" class="btn btn-default">登录</button> -->
<!-- 						</div> -->
<!-- 					</div> -->
				</form>
				@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li> 
				@endforeach
			</ul>
			@endif

				</div>


                </div>
                    
                </div>

            </div>
        </div>
    </div>
	
	

</body>

</html>
