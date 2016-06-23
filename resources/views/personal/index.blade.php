
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
					<li><a href="{{ URL::to('/exercise') }}">运动</a></li>
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
					<li role="presentation" class="active"><a
						href="{{ URL::to('/personal') }}">个人信息</a></li>
					<li role="presentation"><a
						href="{{ URL::to('/personal/modifypassword') }}">修改密码</a></li>
				</ul>
			</div>
			<!-- sidebar -->

			<!-- main content -->
			
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">
				
				<form class="form-horizontal" method="POST" action="/admin/usermodify">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="inputID" class="col-sm-2 control-label">E-Mail</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
						<p class="form-control-static">{{ Auth::user()->email }}</p>
						</div>
					</div>


					<div class="form-group">
						<label for="inputNickname" class="col-sm-2 control-label">昵称</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
						<p class="form-control-static">{{ Auth::user()->nickname }}</p>
						</div>
					</div>
					<div class="form-group">
						<label for="inputTel" class="col-sm-2 control-label">电话</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
						<p class="form-control-static">{{ Auth::user()->tel }}</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">性别</label>
							<div class="col-sm-8 col-md-6 col-lg-8">
							<p class="form-control-static">{{ Auth::user()->sex }}</p>
							</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a class="btn btn-default" href="{{ URL::to('/personal/modify') }}"
								role="button">修改</a>
						</div>
					</div>
				</form>
				

				</div>
			</div>
			<!-- main content -->
		</div>
	</div>



</body>

</html>
