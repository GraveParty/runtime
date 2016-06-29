
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
{{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet"--}}
	{{--media="screen">--}}
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">
<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet" media="screen">

<script type="text/javascript"
	src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap.js"></script>

<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>

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
					{{--<li><a href="{{ URL::to('/health') }}">健康</a></li>--}}
					{{--<li><a href="{{ URL::to('/activity') }}">活动</a></li>--}}
				{{--</ul>--}}
				{{--<ul class="nav navbar-nav navbar-right">--}}
					{{--<li>--}}
						{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" --}}
						{{--role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>--}}
						{{--<ul class="dropdown-menu">--}}
                            {{--<li>--}}
                                {{--<a href="/personal">个人设置</a>--}}
                            {{--</li>--}}
                            {{--<li role="separator" class="divider">--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{ URL::to('/logout') }}">退出登录</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
					{{--</li>--}}
				{{--</ul>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</nav>--}}

	<!-- sidebar -->
	<div class="sidebar">
		<nav class="sidebar-nav">
			<ul class="nav">
				<li class="nav-title">
					设置
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="{{ URL::to('/personal') }}"><i class="icon-puzzle"></i> 个人信息</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/personal/modifypassword') }}"><i class="icon-docs"></i> 修改密码</a>
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
						{{--href="{{ URL::to('/personal') }}">个人信息</a></li>--}}
					{{--<li role="presentation"><a--}}
						{{--href="{{ URL::to('/personal/modifypassword') }}">修改密码</a></li>--}}
				{{--</ul>--}}
			{{--</div>--}}
			<!-- sidebar -->

			<!-- main content -->
			
			<div class="col-md-12">
				<div class="card card-local">
					<div class="card-header">
						<b>修改个人信息</b>

					</div>
					<div class="card-block">
						<form class="form-horizontal" method="POST" action="/personal/modify">
							{!! csrf_field() !!}

							<div class="form-group row">
								<label for="input" class="col-md-1 col-md-offset-1 control-label">E-Mail</label>

								<div class="col-md-9">
									<p class="form-control-static">{{ Auth::user()->email }}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="inputNickname" class="col-md-1 col-md-offset-1 control-label">昵称</label>

								<div class="col-md-9">
									<p class="form-control-static">{{ Auth::user()->nickname }}</p>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputContent" class="col-md-1 col-md-offset-1 control-label">电话</label>

								<div class="col-md-9">
									<p class="form-control-static">{{ Auth::user()->tel }}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="" class="col-md-1 col-md-offset-1 control-label">性别</label>

								<div class="col-md-9">
									<p class="form-control-static">{{ Auth::user()->sex }}</p>
								</div>
							</div>


							<div class="form-group row">
								<div class="col-md-9 col-md-offset-2">
									<a role="button" class="btn btn-success" href="{{ URL::to('/personal/modify') }}" >修改</a>
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


				{{--<div class="row">--}}
				{{----}}
				{{--<form class="form-horizontal" method="POST" action="/admin/usermodify">--}}
					{{--{!! csrf_field() !!}--}}

					{{--<div class="form-group">--}}
						{{--<label for="inputID" class="col-sm-2 control-label">E-Mail</label>--}}

						{{--<div class="col-sm-8 col-md-6 col-lg-8">--}}
						{{--<p class="form-control-static">{{ Auth::user()->email }}</p>--}}
						{{--</div>--}}
					{{--</div>--}}


					{{--<div class="form-group">--}}
						{{--<label for="inputNickname" class="col-sm-2 control-label">昵称</label>--}}

						{{--<div class="col-sm-8 col-md-6 col-lg-8">--}}
						{{--<p class="form-control-static">{{ Auth::user()->nickname }}</p>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="form-group">--}}
						{{--<label for="inputTel" class="col-sm-2 control-label">电话</label>--}}

						{{--<div class="col-sm-8 col-md-6 col-lg-8">--}}
						{{--<p class="form-control-static">{{ Auth::user()->tel }}</p>--}}
						{{--</div>--}}
					{{--</div>--}}

					{{--<div class="form-group">--}}
						{{--<label class="col-sm-2 control-label">性别</label>--}}
							{{--<div class="col-sm-8 col-md-6 col-lg-8">--}}
							{{--<p class="form-control-static">{{ Auth::user()->sex }}</p>--}}
							{{--</div>--}}
					{{--</div>--}}
					{{--<div class="form-group">--}}
						{{--<div class="col-sm-offset-2 col-sm-10">--}}
							{{--<a class="btn btn-default" href="{{ URL::to('/personal/modify') }}"--}}
								{{--role="button">修改</a>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</form>--}}
				{{----}}

				{{--</div>--}}
			</div>
			<!-- main content -->
		</div>
	</div>
	</main>



</body>

</html>
