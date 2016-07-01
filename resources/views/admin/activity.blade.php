
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
{{--<link href="{{ URL::asset('/') }}css/bootstrap.css" rel="stylesheet" media="screen">--}}
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet" media="screen">
<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
	media="screen">
<link rel="stylesheet" type="text/css" href="http://localhost:8000/sweetalert/dist/sweetalert.css">

<script src="http://localhost:8000/sweetalert/dist/sweetalert.min.js"></script>
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
					<a style="margin-top:0px" class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
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

	{{----}}
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
					{{--<li class="active"><a href="{{ URL::to('/activity') }}">活动</a></li>--}}
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
					活动
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/amdin/index') }}"><i class="icon-puzzle"></i> 权限管理</a>

				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/admin/newactivity') }}"><i class="icon-docs"></i> 发布活动</a>

				</li>
				<li class="nav-item">
					<a class="nav-link active" href="{{ URL::to('/admin/activity') }}"><i class="icon-graph"></i> 活动审批</a>

				</li>

			</ul>
		</nav>
	</div>



			<!-- main content -->
<!-- main -->
<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
				{{--<div class="sidebar col-xs-2 col-sm-3 col-md-2">--}}
					{{--<ul class="nav nav-pills nav-stacked">--}}
						{{--<li role="presentation" class="active"><a--}}
							{{--href="{{ URL::to('/admin/index') }}">权限管理</a></li>--}}
						{{--<li role="presentation"><a--}}
							{{--href="{{ URL::to('/admin/newactivity') }}">发布活动</a></li>--}}
						{{--<li role="presentation"><a--}}
							{{--href="{{ URL::to('/admin/activity') }}">活动审批</a></li>--}}
					{{--</ul>--}}
				{{--</div>--}}


			<div class="col-md-12">
				   <div class="card">
						<div class="card-header">
								<i>活动审批</i>
						</div>
						<div class="card-block"  color="#FFFF00">
							<div class="row" >
						    	@if(count($activities_tocheck)>0) 
						    	@for($i=0;$i < count($activities_tocheck) && $i < 5;$i++)

								<div class="col-md-2" >
									<div class="card card-local" id= "<?php $i;?>">
									    <div class="card-header" color="000000">
										</div>
										<div class="card-block" style="padding:10px">
									        <div ><img  src="{{ URL::asset('/') }}image/grass.jpg" width="140" height="85"  alt="Lodash"></div>

							                <h3 style="height:50px ">
							                  <p ><?php echo $activities_tocheck[$i]->Theme; ?></p>
							                </h3>
							                <h3 style="height:100px">
									            <p ><br><small><?php echo $activities_tocheck[$i]->Time; ?></small></p>
									        </h3>
							                <p style="height:200px">
							                	<?php echo $activities_tocheck[$i]->Description; ?>
							                </p>
							                
							                <div class="form-group" >
								              <button type="button" class="btn btn-info"  aria-label="Left Align" data-toggle="modal" data-target="#detailToCheckActivity">
								                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
								              </button>
								            </div> 
						                </div>
						            </div>
						        </div>
						        @endfor @endif

				        <p></p>
				    </div>
				    <nav class="col-md-offset-5">
						  <ul class="pagination" >
						    <li>
						      <a href="#" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <li class="active"><a href="#">1</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
						  </ul>
					</nav>

				  </div>
			</div>



			<!-- main content -->
		</div>
		
	</div>


	<!-- detailActivityModal -->
	<div class="modal fade" id="detailToCheckActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">活动名称</h4>
	      </div>
	      <div class="modal-body">
	        <div class="modal-body">

	          <h4>活动主题</h4>
	          <p><?php echo $activities_tocheck[0]->Theme; ?></p>

	          <h4>活动时间</h4>
	          <p><a href="#" data-toggle="tooltip" title="Default tooltip"><?php echo $activities_tocheck[0]->Time; ?></a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>
	          
	          <h4>活动地点</h4>
	          <p><a href="#" class="tooltip-test" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

	          <div class="row">
			    <div class="col-md-6 ">
			                <h4>参与人数</h4>	
	           				<div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_tocheck[0]->peopleNumber; ?> </p>
	  		   				</div>
			    </div>

			    <div class="col-md-6">
			    			<h4>保证金</h4>	
			                <div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_tocheck[0]->Money; ?></p>
	  		   				</div>
			    </div>
		   	  </div>

	          <h4>活动描述</h4>
	          <p><?php echo $activities_tocheck[0]->Description; ?></p>
	          
	          

	          <div class="form-group">
	            <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
	              <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
	            </button>

	            <div class="collapse" id="collapseExample" >
	                  <div id="has_TimeList" class="form-group">
	                      <div id="noneTimelist" >
	                      	<p></p>
	                        <p class="alert alert-info alert-dismissible"><?php echo $activities_tocheck[0]->PlanList; ?></p> 
	                       
	                      </div>
	                  </div>
	            </div>
	          </div>
	        </div>

	   
	      </div>
	      <div class="modal-footer">
	      	<div>
	      		<h4>申报人/申报时间</h4>
	        	<p><?php echo $activities_tocheck[0]->nickname; ?> "/" <?php echo $activities_tocheck[0]->create_at; ?></p>
	    	</div>
	      	<button type="button" class="btn btn-success">通过</button>
	      	<button type="button" class="btn btn-warning">删除</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	      </div>
	    </div>
	  </div>
	</div>


	


</body>

</html>
