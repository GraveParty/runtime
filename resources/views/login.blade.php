
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
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet"
		  media="screen">

	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/tether.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap.js"></script>


	<script>
		function verticalAlignMiddle()
		{
			var bodyHeight = $(window).height();
			var formHeight = $('.vamiddle').height();
			var marginTop = (bodyHeight / 2) - (formHeight / 2);
			if (marginTop > 0)
			{
				$('.vamiddle').css('margin-top', marginTop);
			}
		}
		$(document).ready(function()
		{
			verticalAlignMiddle();
		});
		$(window).bind('resize', verticalAlignMiddle);
	</script>


	<style>
		body {
			/*padding-top: 80px;*/
			/* 	background-color: #4fb04f; */

			font-family: "微软雅黑";
		}
	</style>

</head>

<body>
<!-- fixed header -->
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
				{{--<li class="active"><a href="{{ URL::to('/') }}">主页</a></li>--}}
				{{--<li><a href="{{ URL::to('/login') }}">运动</a></li>--}}
				{{--<li><a href="{{ URL::to('/login') }}">健康</a></li>--}}
				{{--<li><a href="{{ URL::to('/login') }}">活动</a></li>--}}
			{{--</ul>--}}

			{{--@if(!Auth::check())--}}
				{{--<ul class="nav navbar-nav navbar-right">--}}
					{{--<li><a href="{{ URL::to('/login') }}">登录</a></li>--}}
					{{--<li><a href="{{ URL::to('/register') }}">注册</a></li>--}}
				{{--</ul>--}}
			{{--@else--}}
				{{--<ul class="nav navbar-nav navbar-right">--}}
					{{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"--}}
						   {{--role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>--}}
						{{--<ul class="dropdown-menu">--}}
							{{--<li><a href="/personal">个人设置</a></li>--}}
							{{--<li role="separator" class="divider"></li>--}}
							{{--<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>--}}
						{{--</ul></li>--}}
				{{--</ul>--}}
			{{--@endif--}}


		{{--</div>--}}
	{{--</div>--}}
{{--</nav>--}}

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="card-group vamiddle">
				<div class="card  p-a-2">
					<div class="card-block">
						<h2>登录</h2>
						<p class="text-muted">登录您的账号</p>

						<form class="form" method="POST" action="/login">
							{!! csrf_field() !!}

							<div class="form-group">
							<div class="input-group m-b-1">
								<span class="input-group-addon"><i class="icon-user"></i></span>
								<input name="email" type="text" class="form-control" id="inputID"
									   placeholder="E-Mail" value="{{ old('email') }}">
							</div>
							</div>

							<div class="form-group">
							<div class="input-group m-b-2">
								<span class="input-group-addon"><i class="icon-lock"></i></span>
								<input name="password" type="password" class="form-control"
									   id="inputPassword" placeholder="Password">
							</div>
							</div>

							<div class="row">
								<div class="col-xs-6">
									<button type="submit" class="btn btn-success p-x-2">登录</button>
								</div>
								<div class="col-xs-6 text-xs-right">
									<button type="button" class="btn btn-link p-x-0">忘记密码?</button>
								</div>
							</div>

						</form>


					</div>
				</div>
				<div class="card card-inverse card-success p-y-3" style="width:44%">
					<div class="card-block text-xs-center">
						<div>
							<h2>没有账号？</h2>
							<p>创建一个新账号，加入RunTime</p>
							<a role="button" class="btn btn-success active m-t-1" href="{{ URL::to('/register') }}">
								现在加入！</a>
						</div>
					</div>
				</div>
			</div>
			@if($errors->any())
			<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li> @endforeach
			</ul>
			@endif
		</div>
	</div>
</div>


{{--<div--}}
		{{--class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">--}}

	{{--<div class="panel panel-success">--}}
		{{--<div class="panel-heading">--}}
			{{--<strong>登录</strong>--}}
		{{--</div>--}}

		{{--<br>--}}

		{{--<form class="form-horizontal" method="POST" action="/login">--}}

			{{--{!! csrf_field() !!}--}}
			{{--<div class="form-group">--}}
				{{--<label for="inputID" class="col-sm-2 control-label">E-Mail</label>--}}

				{{--<div class="col-sm-8 col-md-6 col-lg-8">--}}
					{{--<input name="email" type="text" class="form-control" id="inputID"--}}
						   {{--placeholder="请输入E-Mail地址" value="{{ old('email') }}">--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="form-group ">--}}
				{{--<label for="inputPassword" class="col-sm-2 control-label">密码</label>--}}

				{{--<div class="col-sm-8 col-md-6 col-lg-8">--}}
					{{--<input name="password" type="password" class="form-control"--}}
						   {{--id="inputPassword" placeholder="请输入密码">--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="form-group">--}}
				{{--<div class="col-sm-offset-2 col-sm-10">--}}
					{{--<div class="checkbox">--}}
						{{--<label> <input type="checkbox">记住我--}}
						{{--</label>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class="form-group">--}}
				{{--<div class="col-sm-offset-2 col-sm-10">--}}
					{{--<button type="submit" class="btn btn-default">登录</button>--}}
					{{--<a class="btn btn-default" href="{{ URL::to('/') }}" role="button">返回</a>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</form>--}}
		{{--@if($errors->any())--}}
			{{--<ul class="alert alert-danger">--}}
				{{--@foreach($errors->all() as $error)--}}
					{{--<li>{{ $error }}</li> @endforeach--}}
			{{--</ul>--}}
			{{--@endif--}}





	{{--</div>--}}






{{--</div>--}}

</body>

</html>
