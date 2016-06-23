
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
					<li class="active"><a href="{{ URL::to('/admin') }}">管理员</a></li>
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
					<li role="presentation"><a
						href="{{ URL::to('/admin') }}">权限管理</a></li>
					<li role="presentation"><a href="{{ URL::to('/admin/newactivity') }}">发布活动</a></li>
					<li role="presentation" class="active"><a href="{{ URL::to('/admin/activity') }}">活动管理</a></li>
				</ul>
			</div>
			<!-- sidebar -->

			<!-- main content -->




			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">

					@if (count($activities) > 0)
					<div>
						<ul>
							@foreach ($activities as $a)
							<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

								<div class="panel panel-default">
									<!-- Default panel contents -->
									<div class="panel-heading">
										<b><?php echo $a->id ?></b>
										<button type="button"
											class="btn btn-default btn-xs btn-success pull-right"
											data-toggle="modal" data-target="#myModal<?php echo $a->id ?>">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											删除
										</button>
										<a role="button" href="/admin/activity/modify/<?php echo $a->id ?>"
											class="btn btn-default btn-xs btn-success pull-right"> <span
											class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											修改
										</a>

									</div>
									<!-- Modal -->
									<div class="modal fade" id="myModal<?php echo $a->id ?>" tabindex="-1"
										role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h5 class="modal-title" id="myModalLabel">确认删除活动？</h5>
												</div>
												<div class="modal-body">
													<button type="button" class="btn btn-default"
														data-dismiss="modal">取消</button>
													<a role="button" href="/admin/activity/delete/<?php echo $a->id ?>" 
													class="btn btn-primary">确认</a>
												</div>
											</div>
										</div>
									</div>

									<!-- Table -->
									<table class="table">
										<tr>
											<th>活动名称</th>
											<th>活动简介</th>
											<th>开始时间</th>
											<th>结束时间</th>
										</tr>
										<tr>
											<td><?php echo $a->title ?></td>
											<td><?php echo $a->introduction ?></td>
											<td><?php echo $a->start ?></td>
											<td><?php echo $a->end ?></td>
										</tr>
									</table>
								</div>

							</div>
							@endforeach
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
