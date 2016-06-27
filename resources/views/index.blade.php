
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
	<link href="{{ URL::asset('/') }}css/supersized.css" rel="stylesheet"
		  media="screen">
	<link href="{{ URL::asset('/') }}css/flexslider.css" rel="stylesheet"
		  media="screen">

<script type="text/javascript"
	src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
<script type="text/javascript"
	src="{{ URL::asset('/') }}js/bootstrap.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/supersized.3.2.7.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery.flexslider-min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/fullscreen.js"></script>


<style>
body {
	padding-top: 120px;
	background-color: #4fb04f;
	/*     background-size: 100%;   */
	/*     width:100%; */
	/* 	position:relative; */

	font-family: "微软雅黑";
}

.title{
text-align:center;
font-size:90px;
color: #ffffff;

}
.title .info{
font-size:20px;

}

.start{
border: 3px solid white;
font-size:20px;
/*background-color: #4fb04f;*/
	background-color: transparent;
color: #ffffff;
}

.start:hover{
border: 3px solid white;
font-size:20px;
background-color: #ffffff;
/*color: #4fb04f;*/
	clear: none;;
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
	<br>
	<br>
	<br>

	<div class="cover"></div>



	<div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p>RunTime</p>

		<p class="info">在Runtime，享受运动时光</p>
		<p>
		
			<a class="start btn btn-default btn-lg" href="{{ URL::to('login/') }}" role="button">START NOW ></a>
		</p>


	</div>
	

</body>

</html>
