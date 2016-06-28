
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
	<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
	{{--<link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet" media="screen">--}}
	<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
		  media="screen">
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">

	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap.js"></script>

	<script type="text/javascript" src="{{ URL::asset('/') }}js/Chart.js"></script>



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


<div class="modal fade" id="mobal-suggestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!--  <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">申请建议</h4>
             </div> -->
			<div class="modal-body" >
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#allhost" data-toggle="tab">
							全站申请</a>
					</li>
					<li><a href="#onecoach" data-toggle="tab">指定教练</a></li>
					<!-- <li class="dropdown">
                       <a href="#" id="myTabDrop1" class="dropdown-toggle"
                          data-toggle="dropdown">Java <b class="caret"></b>
                       </a>
                       <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                          <li><a href="#jmeter" tabindex="-1" data-toggle="tab">
                             jmeter</a>
                          </li>
                          <li><a href="#ejb" tabindex="-1" data-toggle="tab">
                             ejb</a>
                          </li>
                       </ul>
                    </li> -->
				</ul>
				<div id="myTabContent" class="tab-content">
					

					
						<div class="input-group" style="width: 100%">
							<input type = "text" class="form-control" placeholder="标题" id="one_title">
							<textarea class="form-control" placeholder="内容" id="one_content" rows="5"></textarea>

						</div>
						<div class="input-group">
							<span class="input-group-addon">分类</span>
							<select class="form-control" id="one_category">
								<option>运动/健身</option>
								<option>饮食</option>
								<option>健康</option>
							</select>
							<span class="input-group-addon">教练</span>
							<select class="form-control" id="coach_list">
									<option value="0">全站提问</option>
								@foreach ($coachlist as $cl)
									<option value = '<?php echo $cl->id ?>'><?php echo $cl->nickname ?></option>
								@endforeach
							</select>
						</div>



					

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" id="pppp">提交</button>
			</div>
		</div>
	</div>
</div>

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
{{--<li class="active"><a href="{{ URL::to('/exercise') }}">运动</a></li>--}}
{{--<li><a href="{{ URL::to('/health') }}">健康</a></li>--}}
{{--<li><a href="{{ URL::to('/activity') }}">活动</a></li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="/personal">个人设置</a></li>--}}
{{--<li role="separator" class="divider"></li>--}}
{{--<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>--}}
{{--</ul></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}


<!-- sidebar -->
<div class="sidebar">
	<nav class="sidebar-nav">
		<ul class="nav">
			<li class="nav-title">
				运动
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise') }}"><i class="icon-puzzle"></i> 我的运动</a>

			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise/history') }}"><i class="icon-docs"></i> 历史数据</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/exercise/chart') }}"><i class="icon-graph"></i> 图表展示</a>

			</li>
			<li class="divider"></li>
			<li class="nav-title">
				健康
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health') }}"><i class="icon-puzzle"></i> 身体管理</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health/sleep') }}"><i class="icon-speedometer"></i> 睡眠分析</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/health/rate') }}"><i class="icon-graph"></i> 心率分析</a>
			</li>

			<li class="divider"></li>
			<li class="nav-title">
				建议
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ URL::to('/exercise/suggestion') }}"><i class="icon-people"></i> 锻炼建议</a>
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
			{{--<li role="presentation"><a href="{{ URL::to('/exercise') }}">我的运动</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/goal') }}">运动目标</a></li>--}}
			{{--<li role="presentation"><a--}}
			{{--href="{{ URL::to('/exercise/history') }}">历史数据</a></li>--}}
			{{--<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>--}}
			{{--<li role="presentation" class="active"><a--}}
			{{--href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>--}}
			{{--</ul>--}}
			{{--</div>--}}
			<!-- main content -->
			<div class="col-md-12">


				@if($hasAsked==0)
					<a id = "postR"
					   class="btn btn-large btn-success" type="button" data-target="#mobal-suggestion" data-toggle="modal">&nbsp;申请建议&nbsp; <span
								class="glyphicon glyphicon glyphicon-chevron-right"
								aria-hidden="true"></span>
					</a>
				@else
					<a href="#" class="btn btn-large btn-success disabled"
					   role="button">&nbsp;等待答复&nbsp; <span
								class="glyphicon glyphicon glyphicon-chevron-right"
								aria-hidden="true"></span>
					</a> @endif <br> <br>
				@if(count($suggestions) > 0)
					<div>
						<ul>
							@if($hasAsked==1)
								@foreach($notAnswered as $nA)
									<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

										<div class="card card-local">
											<!-- Default panel contents -->
											<div class="card-header">
												<b><?php echo $nA->title ?></b>
												<button type="button"
														class="btn btn-default btn-xs btn-success" style="background: rgba(0, 153, 255, 1);border-color: rgba(0, 153, 255, 1)">
													<?php echo $nA->kind ?>
												</button>

												<div class="pull-right">
													提问于<?php echo $nA->created_at ?> &nbsp;
												</div>

											</div>


											<div class="card-block">
												<!-- Table -->
												<div class="">
													<br><br>
												</div>

												<div class="card">
													<div class="card-header">

													</div>
													<div class="card-block">
														暂无回答，请耐心等待
													</div>
												</div>
											</div>
										</div>

									</div>
								@endforeach
							@else
							@endif
							@foreach ($suggestions as $su)
							<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

								<div class="card card-local">
									<!-- Default panel contents -->
									<div class="card-header">
										<b><?php echo $su->title ?></b>
										<button type="button"
												class="btn btn-default btn-xs btn-success" style="background: rgba(0, 153, 255, 1);border-color: rgba(0, 153, 255, 1)">
											<?php echo $su->kind ?>
										</button>
										@if($su->state==0)
											<button type="button"
													class="btn btn-default btn-xs btn-success pull-right"
													data-toggle="modal"
													data-target="#myModal<?php echo $su->id ?>">
												<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
												确认
											</button>

										@else
											<button type="button"
													class="btn btn-default btn-xs btn-success pull-right"
													>

												已确认
											</button>

										@endif
										<div class="pull-right">
											提问于<?php echo $su->asdate ?> &nbsp;
										</div>

									</div>
									<!-- Modal -->
									<div class="modal fade" id="myModal<?php echo $su->id ?>"
										 tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h5 class="modal-title" id="myModalLabel">确认已读建议？</h5>
												</div>
												<div class="modal-body">
													<button type="button" class="btn btn-default"
															data-dismiss="modal">取消</button>
													<a role="button"
													   href="/exercise/suggestion/delete/<?php echo $su->question_id ?>"
													   class="btn btn-primary">确认</a>
												</div>
											</div>
										</div>
									</div>

									<div class="card-block">
										<!-- Table -->
										<div class="">
											<?php echo $su->ask_content ?>
											<br><br>
										</div>

										<div class="card">
											<div class="card-header">
												<b><?php echo $su->nickname ?>:教练</b>
												<div class="pull-right">
													回答于
													<?php echo $su->addate?>
												</div>
											</div>
											<div class="card-block">

												<?php echo $su->reply ?>
											</div>
										</div>
									</div>
								</div>
								</div>
							@endforeach
						</ul>
					</div>
				@else
					<div class="card card-local">
						<div class="card-header">
							<b>建议</b>
						</div>
						<div class="card-block">
							<p>当前暂无建议</p>
						</div>
					</div>
				@endif
			</div>

			<!-- main content -->
		</div>
	</div>
</main>


</body>
<script type="text/javascript" src="{{ URL::asset('/') }}js/exercise_sug.js"></script>
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
</html>
