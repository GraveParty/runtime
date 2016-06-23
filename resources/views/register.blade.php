
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
					<li class="active"><a href="{{ URL::to('/') }}">主页</a></li>
					<li><a href="{{ URL::to('/login') }}">运动</a></li>
					<li><a href="{{ URL::to('/login') }}">健康</a></li>
					<li><a href="{{ URL::to('/login') }}">活动</a></li>
				</ul>

				@if(!Auth::check())
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ URL::to('/login') }}">登录</a></li>
					<li><a href="{{ URL::to('/register') }}">注册</a></li>
				</ul>
				@else
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"
						role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/personal">个人设置</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>
						</ul></li>
				</ul>
				@endif


			</div>
		</div>
	</nav>

	<br>
	<br>




	<div
		class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">

		<div class="panel panel-success">
			<div class="panel-heading">
				<strong>注册</strong>
			</div>

			<br>

			<form class="form-horizontal" method="POST" action="/register">
				{!! csrf_field() !!}

				<div class="form-group">
					<label for="inputID" class="col-sm-2 control-label">E-Mail</label>

					<div class="col-sm-8 col-md-6 col-lg-8">
						<input name="email" type="text" class="form-control" id="inputID"
							placeholder="请输入E-Mail地址" value="{{ old('email') }}">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label">密码</label>

					<div class="col-sm-8 col-md-6 col-lg-8">
						<input name="password" type="password" class="form-control"
							id="inputPassword" placeholder="请输入密码">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword2" class="col-sm-2 control-label">确认密码</label>

					<div class="col-sm-8 col-md-6 col-lg-8">
						<input name="password_confirmation" type="password"
							class="form-control" id="inputPassword2" placeholder="再次输入密码">
					</div>
				</div>

				{{--new factor--}}

				<div class="form-group">
					<label for="inputNickname" class="col-sm-2 control-label">昵称</label>

					<div class="col-sm-8 col-md-6 col-lg-8">
						<input name="nickname" type="text" class="form-control"
							id="inputNickname" placeholder="请输入昵称"
							value="{{ old('nickname') }}">
					</div>
				</div>
				<div class="form-group">
					<label for="inputTel" class="col-sm-2 control-label">电话</label>

					<div class="col-sm-8 col-md-6 col-lg-8">
						<input name="tel" type="text" class="form-control" id="inputTel"
							placeholder="请输入电话" value="{{ old('tel') }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">性别</label>

					<div class="controls">
						<div class="col-sm-8 col-md-6 col-lg-8">
							<!-- Inline Radios -->
							<label class="radio-inline"> <input type="radio" value="1"
								checked="checked" name="sex">男
							</label> <label class="radio-inline"> <input type="radio"
								value="2" name="sex"> 女
							</label>
						</div>

					</div>
				</div>

				{{--new factor--}}

				<div class="form-group">
					<label class="col-sm-2 control-label">类型</label>

					<div class="controls">
						<div class="col-sm-8 col-md-6 col-lg-8">
							<!-- Inline Radios -->
							<label class="radio-inline"> <input type="radio" value="1"
								checked="checked" name="type">普通用户
							</label> <label class="radio-inline"> <input type="radio"
								value="2" name="type"> 教练·
							</label> <label class="radio-inline"> <input type="radio"
								value="3" name="type"> 医生
							</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">注册</button>
						<a class="btn btn-default" href="{{ URL::to('/') }}" role="button">返回</a>
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

</body>

</html>
