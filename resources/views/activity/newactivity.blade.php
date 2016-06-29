
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
                    <li role="presentation"><a href="{{ URL::to('/activity') }}">最新活动</a></li>
                    <li role="presentation" ><a href="{{ URL::to('/activity/myactivity') }}">我的活动</a></li>
                    <li role="presentation" class="active"><a href="{{ URL::to('/activity/newactivity') }}">发布活动</a></li>
                </ul>
            </div>
            
    <!-- main content -->
            
            <div class="col-md-10">
              <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">参与活动</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">开展活动</a></li>
               
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="check" style="height:500px">

                        @if(count($activities_enter)>0) 
                        @for($i=0; ($i< count($activities_enter)) && ($i< 5);$i++)

                        <div class="col-md-2" id= "<?php $i;?>">
                            <div class="thumbnail">
                              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
                              <div class="caption">
                                <h3 style="height:100px">

                                  <p ><?php echo $activities_enter[$i]->Theme; ?><br><small><?php echo $activities_enter[$i]->Time; ?></small></p>
                                </h3>
                                <p style="height:200px">
                                    <?php echo $activities_enter[$i]->Description; ?>
                                </p>
                                
                                <div class="form-group" >
                                  <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailEnterActivity">
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

                        @if(count($activities_my)>0) 
                        @for($i=0;$i < count($activities_my) && $i < 5;$i++)

                        <div class="col-md-2" id= "<?php $i;?>">
                            <div class="thumbnail">
                              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
                              <div class="caption">
                                <h3 style="height:100px">
                                  <p ><?php echo $activities_my[$i]->Theme; ?><br><small><?php echo $activities_my[$i]->Time; ?></small></p>
                                </h3>
                                <p style="height:200px">
                                    <?php echo $activities_my[$i]->Description; ?>
                                </p>
                                
                                <div class="form-group" >
                                  <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailMyActivity">
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
    <div class="modal fade" id="detailEnterActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">活动名称</h4>
          </div>
          <div class="modal-body">
            <div class="modal-body">

              <h4>活动主题</h4>
              <p><?php echo $activities_my[4]->Theme; ?></p>

              <h4>活动时间</h4>
              <p><?php echo $activities_my[4]->Time; ?></p>
              
              <h4>活动地点</h4>
             <p><?php echo $activities_my[4]->Feild; ?></p>

              <div class="row">
                <div class="col-md-6 ">
                            <h4>参与人数</h4>   
                            <div class="bs-example tooltip-demo">
                                <p><?php echo $activities_my[4]->peopleNumber; ?> </p>
                            </div>
                </div>

                <div class="col-md-6">
                            <h4>保证金</h4>    
                            <div class="bs-example tooltip-demo">
                                <p><?php echo $activities_my[4]->Money; ?></p>
                            </div>
                </div>
              </div>

              <h4>活动描述</h4>
              <p><?php echo $activities_my[4]->Description; ?></p>
              
              
              

             <div class="form-group">
                <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
                  <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
                </button>

                <div class="collapse" id="collapseExample" >
                      <div id="has_TimeList" class="form-group">
                          <div id="noneTimelist" >
                            <p></p>
                            <p class="alert alert-info alert-dismissible"><?php echo $activities_my[4]->PlanList; ?></p> 
                            <p></p>
                            <p class="alert alert-info alert-dismissible"><?php echo $activities_my[5]->PlanList; ?></p> 
                          </div>
                      </div>
                </div>
              </div>
            </div>

       
          </div>
          <div class="modal-footer">
            <div>
                <h4>提交时间</h4>
                <p><?php echo $activities_my[0]->created_at; ?></p>
            </div>
            <button type="button" class="btn btn-warning">退出</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          </div>
        </div>
      </div>
    </div>


    <!-- detailGovActivityModal -->
    <div class="modal fade" id="detailMyActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">活动名称-<?php echo $activities_my[0]->State; ?></h4>
          </div>
          <div class="modal-body">
            <div class="modal-body">

              <h4>活动主题</h4>
              <p><?php echo $activities_my[0]->Theme; ?></p>

              <h4>活动时间</h4>
              <p><?php echo $activities_my[0]->Time; ?></p>
              
              <h4>活动地点</h4>
              <p><?php echo $activities_my[0]->Feild; ?></p>

              <div class="row">
                <div class="col-md-6 ">
                            <h4>参与人数</h4>   
                            <div class="bs-example tooltip-demo">
                                <p><?php echo $activities_my[0]->peopleNumber; ?> </p>
                            </div>
                </div>

                <div class="col-md-6">
                            <h4>保证金</h4>    
                            <div class="bs-example tooltip-demo">
                                <p><?php echo $activities_my[0]->Money; ?></p>
                            </div>
                </div>
              </div>

              <h4>活动描述</h4>
              <p><?php echo $activities_my[0]->Description; ?></p>
              
              

              <div class="form-group">
                <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
                  <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
                </button>

                <div class="collapse" id="collapseExample" >
                      <div id="has_TimeList" class="form-group">
                          <div id="noneTimelist" >
                            <p></p>
                            <p class="alert alert-info alert-dismissible"><?php echo $activities_my[0]->PlanList; ?></p> 
                           
                          </div>
                      </div>
                </div>
              </div>
            </div>

       
          </div>
          <div class="modal-footer">
            <div>
                <h4>负责人/单位</h4>
                <p><?php echo $activities_my[0]->create_at; ?></p>
            </div>
            <button type="button" class="btn btn-info">撤销</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          </div>
        </div>
      </div>
    </div>






</body>

</html>
