
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
					<li class="active"><a href="{{ URL::to('/activity') }}">活动</a></li>
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
			<div class="sidebar col-xs-2 col-sm-3 col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="active"><a
						href="{{ URL::to('/activity') }}">最新活动</a></li>
					<li role="presentation"><a
						href="{{ URL::to('/activity/myactivity') }}">我的活动</a></li>
				</ul>
			</div>
			<!-- main content -->
			<div class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                <div class="row">

                    @if (count($activities) > 0)
                        <div>
                            <ul>
                            	@for($i=0;$i<count($activities);$i++)
                            	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                        <!-- thumnail -->
                                        <div class="thumbnail">
                                            <img src="{{ URL::asset('/') }}image/grass.jpg" alt="...">
                                            <div class="caption">
                                                <h3><?php echo $activities[$i]->title ?></h3>
                                                <p>开始: <?php echo $activities[$i]->start ?></p>
                                                <p>结束: <?php echo $activities[$i]->end ?></p>
                                                <p><?php echo $activities[$i]->introduction ?></p>
                                                <p>
                                                    @if($isIn[$i]==0)
                                                        <a href="/activity/success/<?php echo $activities[$i]->id ?>" class="btn btn-primary btn-success" role="button">&nbsp;报名&nbsp;<span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                                                    @else
                                                        <a href="#" class="btn btn-primary btn-success disabled" role="button">&nbsp;已报名&nbsp;<span class="glyphicon glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            	@endfor
                            	
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
			<!-- main content -->
		</div>
	</div>




</body>

</html>
