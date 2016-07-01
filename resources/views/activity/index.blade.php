
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
<link href="{{ URL::asset('/') }}css/bootstrap.css" rel="stylesheet"
	media="screen">
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
			{{--<ul class="nav navbar-nav pull-right hidden-md-down">--}}
				{{--<li class="nav-item dropdown">--}}
					{{--<a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
						{{--<span class="hidden-md-down">{{ Auth::user()->nickname }}</span>--}}
					{{--</a>--}}
					{{--<div class="dropdown-menu dropdown-menu-right">--}}

						{{--<div class="dropdown-header text-xs-center">--}}
							{{--<strong>设置</strong>--}}
						{{--</div>--}}
						{{--<a class="dropdown-item" href="{{ URL::to('/personal') }}"><i class="fa fa-user"></i> 个人设置</a>--}}
						{{--<a class="dropdown-item" href="{{ URL::to('/logout') }}"><i class="fa fa-lock"></i> 退出登录</a>--}}
					{{--</div>--}}
				{{--</li>--}}

			{{--</ul>--}}
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
					<a class="nav-link active" href="{{ URL::to('/activity') }}"><i class="icon-puzzle"></i> 最新活动</a>

				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/activity/myactivity') }}"><i class="icon-docs"></i> 我的活动</a>

				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/activity/newactivity') }}"><i class="icon-graph"></i> 发布活动</a>

				</li>

			</ul>
		</nav>
	</div>




	<!-- main -->
	<main class="main">
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			{{--<div class="sidebar col-xs-2 col-sm-3 col-md-2">--}}
				{{--<ul class="nav nav-pills nav-stacked">--}}
					{{--<li role="presentation" class="active"><a--}}
						{{--href="{{ URL::to('/activity') }}">最新活动</a></li>--}}
					{{--<li role="presentation"><a--}}
						{{--href="{{ URL::to('/activity/myactivity') }}">我的活动</a></li>--}}
					{{--<li role="presentation"><a--}}
						{{--href="{{ URL::to('/activity/newactivity') }}">发布活动</a></li>--}}
				{{--</ul>--}}
			{{--</div>--}}
			<!-- main content -->
			
			<div class="col-md-12">
			  <!-- Nav tabs -->
				  {{--<ul class="nav nav-tabs" role="tablist">--}}
				    {{--<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">所有活动</a></li>--}}
				    {{--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">官方活动</a></li>--}}
				    {{--<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">私人活动</a></li>--}}
				  {{--</ul>--}}

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="check" style="height:500px">

				    	@if(count($activities_all)>0) 
				    	@for($i=0; ($i< count($activities_all)) && ($i< 5);$i++)

						<div class="col-md-2" id= "<?php $i;?>">
				            <div class="thumbnail">
				              <a style="height:80px" href="http://lodashjs.com/" title="Lodash 是最流行的 JavaScript 工具库。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'lodash'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/lodash.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/lodash.png" alt="Lodash"></a>
				              <div class="caption">
				                <h3 style="height:100px">

				                  <p ><?php echo $activities_all[$i]->Theme; ?><br><small><?php echo $activities_all[$i]->Time; ?></small></p>
				                </h3>
								  <br>
				                <p style="height:150px">
				                	<?php echo $activities_all[$i]->Description; ?>
				                </p>

				                <p style="height:40px" >
				                	（可参与）
				                </p>
				                
				                <div class="form-group" >
					              <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailAllActivity">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div> 
				              </div>
				            </div>
				        </div>
				        @endfor @endif

				         <p ></p>
				        
				        
		        
				    </div>

				    <div role="tabpanel" class="tab-pane " id="gov">

				    	@if(count($activities_gov)>0) 
				    	@for($i=0;$i < count($activities_gov) && $i < 5;$i++)

						<div class="col-md-2" id= "<?php $i;?>">
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3 style="height:100px">
				                  <p ><?php echo $activities_gov[$i]->Theme; ?><br><small><?php echo $activities_gov[$i]->Time; ?></small></p>
				                </h3>
				                <p style="height:200px">
				                	<?php echo $activities_gov[$i]->Description; ?>
				                </p>
				                
				                <div class="form-group" >
					              <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailGovActivity">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div> 
				              </div>
				            </div>
				        </div>


				        @endfor @endif

				        
				    </div>
				    <div role="tabpanel" class="tab-pane" id="personal">
				    	@if(count($activities_personal)>0) 
				    	@for($i=0;$i < count($activities_personal) &&  $i < 5;$i++)
						<div class="col-md-2" id= "<?php $i;?>">
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3 style="height:100px">
				                  <p ><?php echo $activities_personal[$i]->Theme; ?><br><small><?php echo $activities_personal[$i]->Time; ?></small></p>
				                </h3>
				                <p style="height:200px">
				                	<?php echo $activities_personal[$i]->Description; ?>
				                </p>
				                
				                <div class="form-group" >
					              <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailPersonalActivity">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div> 
				              </div>
				            </div>
				        </div>

				        @endfor @endif

				    </div>
				  </div>
			</div>



			<!-- main content -->
		</div>
			<nav class="col-md-offset-5">
		  <ul class="pagination" >
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li class="active"><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
			</nav>
		</div>


	<!-- detailAllActivityModal -->
	<div class="modal fade" id="detailAllActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">活动类型-官方活动</h4>
	      </div>
	      <div class="modal-body">
	        <div class="modal-body">

	          <h4>活动主题</h4>
	          <p><?php echo $activities_all[4]->Theme; ?></p>

	          <h4>活动时间</h4>
	          <p><?php echo $activities_all[4]->Time; ?></p>
	          
	          <h4>活动地点</h4>
	          <p><?php echo $activities_all[4]->Field; ?></p>

	          <div class="row">
			    <div class="col-md-6 ">
			                <h4>参与人数</h4>	
	           				<div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_all[4]->peopleNumber; ?> </p>
	  		   				</div>
			    </div>

			    <div class="col-md-6">
			    			<h4>保证金</h4>	
			                <div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_all[4]->Money; ?></p>
	  		   				</div>
			    </div>
		   	  </div>

	          <h4>活动描述</h4>
	          <p><?php echo $activities_all[4]->Description; ?></p>
	          
	          
	          

	         <div class="form-group">
	            <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
	              <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
	            </button>

	            <div class="collapse" id="collapseExample" >
	                  <div id="has_TimeList" class="form-group">
	                      <div id="noneTimelist" >
	                      	<p></p>
	                        <p class="alert alert-info alert-dismissible"><?php echo $activities_all[4]->PlanList; ?></p> 
	                        <p></p>
	                        <p class="alert alert-info alert-dismissible"><?php echo $activities_all[5]->PlanList; ?></p> 
	                      </div>
	                  </div>
	            </div>
	          </div>
	        </div>

	   
	      </div>
	      <div class="modal-footer">
	      	<div>
	      		<h4>负责人</h4>
	        	<p><?php echo $activities_all[4]->UserName; ?></p>
	    	</div>
	      	<button type="button" class="btn btn-info" data-dismiss="modal" onclick="sign()">报名</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- detailGovActivityModal -->
	<div class="modal fade" id="detailGovActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">活动名称</h4>
	      </div>
	      <div class="modal-body">
	        <div class="modal-body">

	          <h4>活动主题</h4>
	          <p><?php echo $activities_all[0]->Theme; ?></p>

	          <h4>活动时间</h4>
	          <p><?php echo $activities_all[0]->Time; ?></p>
	          
	          <h4>活动地点</h4>
	         <p><?php echo $activities_all[0]->Feild; ?></p>

	          <div class="row">
			    <div class="col-md-6 ">
			                <h4>参与人数</h4>	
	           				<div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_all[0]->peopleNumber; ?> </p>
	  		   				</div>
			    </div>

			    <div class="col-md-6">
			    			<h4>保证金</h4>	
			                <div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_all[0]->Money; ?></p>
	  		   				</div>
			    </div>
		   	  </div>

	          <h4>活动描述</h4>
	          <p><?php echo $activities_all[0]->Description; ?></p>
	          
	          

	          <div class="form-group">
	            <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
	              <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
	            </button>

	            <div class="collapse" id="collapseExample" >
	                  <div id="has_TimeList" class="form-group">
	                      <div id="noneTimelist" >
	                      	<p></p>
	                        <p class="alert alert-info alert-dismissible"><?php echo $activities_all[0]->PlanList; ?></p> 
	                       
	                      </div>
	                  </div>
	            </div>
	          </div>
	        </div>

	   
	      </div>
	      <div class="modal-footer">
	      	<div>
	      		<h4>负责人/单位</h4>
	        	<p><?php echo $activities_all[0]->create_at; ?></p>
	    	</div>
	      	<button type="button" class="btn btn-info">报名</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- detailPerActivityModal -->
	<div class="modal fade" id="detailPersonalActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">活动名称</h4>
	      </div>
	      <div class="modal-body">
	        <div class="modal-body">

	          <h4>活动主题</h4>
	          <p><?php echo $activities_all[0]->Theme; ?></p>

	          <h4>活动时间</h4>
	          <p><?php echo $activities_all[0]->Time; ?></p>
	          
	          <h4>活动地点</h4>
	         <p><?php echo $activities_all[0]->Feild; ?></p>

	          <div class="row">
			    <div class="col-md-6 ">
			                <h4>参与人数</h4>	
	           				<div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_all[0]->peopleNumber; ?> </p>
	  		   				</div>
			    </div>

			    <div class="col-md-6">
			    			<h4>保证金</h4>	
			                <div class="bs-example tooltip-demo">
	    						<p><?php echo $activities_all[0]->Money; ?></p>
	  		   				</div>
			    </div>
		   	  </div>

	          <h4>活动描述</h4>
	          <p><?php echo $activities_all[0]->Description; ?></p>
	          
	          

	          <div class="form-group">
	            <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
	              <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
	            </button>

	            <div class="collapse" id="collapseExample" >
	                  <div id="has_TimeList" class="form-group">
	                      <div id="noneTimelist" >
	                      	<p></p>
	                        <p class="alert alert-info alert-dismissible"><?php echo $activities_all[0]->PlanList; ?></p> 
	                       
	                      </div>
	                  </div>
	            </div>
	          </div>
	        </div>

	   
	      </div>
	      <div class="modal-footer">
	      	<div>
	      		<h4>负责人/单位</h4>
	        	<p><?php echo $activities_all[0]->create_at; ?></p>
	    	</div>
	      	<button type="button" class="btn btn-info">报名</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	      </div>
	    </div>
	  </div>
	</div>

		</main>

<script>
function sign(){
	swal({   
              title: "报名成功！",
              text: "",
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "#90EE90",
              confirmButtonText: "OK",
              closeOnConfirm: true },
              function(){
            	  
                  });
}
</script>


</body>

<script src="{{ URL::asset('/') }}js/libs/tether.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/pace.min.js"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ URL::asset('/') }}js/views/shared.js"></script>
<!-- GenesisUI main scripts -->
<script src="{{ URL::asset('/') }}js/app.js"></script>
<!-- Plugins and scripts required by this views -->
{{--<script src="{{ URL::asset('/') }}js/libs/toastr.min.js"></script>--}}
<script src="{{ URL::asset('/') }}js/libs/jquery.maskedinput.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/Chart.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/select2.min.js"></script>
<!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/forms.js"></script>
<script src="{{ URL::asset('/') }}js/app-options.js"></script>
<script src="{{ URL::asset('/') }}js/views/widgets.js"></script>

</html>
