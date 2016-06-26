
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
				   <div class="tab-pane fade in active" id="allhost">
				      <div class="input-group" style="width: 100%">
				      	<input type = "text" class="form-control" placeholder="标题" id="title">
				      	<textarea class="form-control" placeholder="内容" id="content" rows="5"></textarea> 
				      	
				      </div>

				       <div class="input-group">
				      		<span class="input-group-addon">分类</span>
							<select class="form-control" id="category">
				      			<option>运动/健身</option>
				      			<option>饮食</option>
				      			<option>健康</option>	
				      			</select>			      
				      </div>
				   </div>

				   <div class="tab-pane fade" id="onecoach">
				      <div class="input-group" style="width: 100%">
				      	<input type = "text" class="form-control" placeholder="标题" id="title">
				      	<textarea class="form-control" placeholder="内容" id="content" rows="5"></textarea> 
				      	
				      </div>
				      <div class="input-group">
				      		<span class="input-group-addon">分类</span>
							<select class="form-control" id="category">
				      			<option>运动/健身</option>
				      			<option>饮食</option>
				      			<option>健康</option>
				      			</select>
				      	<span class="input-group-addon">教练</span>
				      		<select class="form-control" id="category">
				      			<option>教练A</option>
				      			<option>教练B</option>
				      			<option>教练C</option>
				      			</select>
				      </div>
				      
				      
				      
				   </div>
				   
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="suggestion_confirm">提交</button>
      </div>
    </div>
  </div>
</div>

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
					<li role="presentation"><a
						href="{{ URL::to('/exercise/history') }}">历史数据</a></li>
					<li role="presentation"><a href="{{ URL::to('/exercise/chart') }}">图表展示</a></li>
					<li role="presentation" class="active"><a
						href="{{ URL::to('/exercise/suggestion') }}">锻炼建议</a></li>
				</ul>
			</div>
			<!-- main content -->
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">


					@if($hasAsked==0) <a
						class="btn btn-large btn-success" type="button" data-target="#mobal-suggestion" data-toggle="modal">&nbsp;申请建议&nbsp; <span
						class="glyphicon glyphicon glyphicon-chevron-right"
						aria-hidden="true"></span>
					</a> @else <a href="#" class="btn btn-large btn-success disabled"
						role="button">&nbsp;已申请建议&nbsp; <span
						class="glyphicon glyphicon glyphicon-chevron-right"
						aria-hidden="true"></span>
					</a> @endif <br> <br> @if(count($suggestions) > 0)
					<div>
						<ul>
							@foreach ($suggestions as $su)
							<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

								<div class="panel panel-default">
									<!-- Default panel contents -->
									<div class="panel-heading">
										<b><?php echo $su->id ?></b>

										<button type="button"
											class="btn btn-default btn-xs btn-success pull-right"
											data-toggle="modal"
											data-target="#myModal<?php echo $su->id ?>">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											确认
										</button>

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
														href="/exercise/suggestions/delete/<?php echo $su->id ?>"
														class="btn btn-primary">确认</a>
												</div>
											</div>
										</div>
									</div>

									<div class="panel-body">
										<!-- Table -->
										<table class="table">
											<tr>
												<th>教练</th>
												<th>建议内容</th>
											</tr>
											<tr>
												<td><?php echo $su->nickname ?></td>
												<td><?php echo $su->content ?></td>
											</tr>
										</table>
									</div>
								</div>

							</div>
							@endforeach
						</ul>
					</div>
					@else
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
						<div class="panel panel-default panel-success">
							<div class="panel-heading">
								<b>建议</b>
							</div>
							<div class="panel-body">
								<p>当前暂无建议</p>
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>

			<!-- main content -->
		</div>
	</div>


</body>

</html>
