
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



	<div class="col-md-10">
			  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">待审活动</a></li>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">官方活动</a></li>
				    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">私人活动</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">
				    	<div class="col-md-2" >
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3>
				                  <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
				                </h3>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <div class="form-group" >
					              <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailActivity">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div> 
				              </div>
				            </div>
				        </div>

				        <div class="col-md-2">
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3>
				                  <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
				                </h3>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <div class="form-group">
					              <button type="button" class="btn btn-default"  aria-label="Left Align">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div>
				              </div>
				            </div>
				        </div>

				        <div class="col-md-2">
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3>
				                  <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
				                </h3>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <div class="form-group">
					              <button type="button" class="btn btn-default"  aria-label="Left Align">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div>
				              </div>
				            </div>
				        </div>

				        <div class="col-md-2">
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3>
				                  <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
				                </h3>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <div class="form-group">
					              <button type="button" class="btn btn-default"  aria-label="Left Align">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div>
				              </div>
				            </div>
				        </div>

				        <div class="col-md-2">
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3>
				                  <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
				                </h3>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <div class="form-group">
					              <button type="button" class="btn btn-default"  aria-label="Left Align">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div>
				              </div>
				            </div>
				        </div>


				        <nav>
							<ul class="pager">
						        <div class="form-group">
								    <li><a href="#">NextPage <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
										
								    </li>
								</div>
							</ul>
						</nav>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="profile">
						<div class="col-md-2" >
				            <div class="thumbnail">
				              <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/codeguide.png" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
				              <div class="caption">
				                <h3>
				                  <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
				                </h3>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <p>
				                Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。
				                </p>
				                <div class="form-group" >
					              <button type="button" class="btn btn-default"  aria-label="Left Align" data-toggle="modal" data-target="#detailMyActivity">
					                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> 详情 </span>
					              </button>
					            </div> 
				              </div>
				            </div>
				        </div>

				        <nav>
							<ul class="pager">
						        <div class="form-group">
								    <li><a href="#">NextPage <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
										
								    </li>
								</div>
							</ul>
						</nav>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="messages">...</div>
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


	<!-- detailActivityModal -->
	<div class="modal fade" id="detailActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">活动名称</h4>
	      </div>
	      <div class="modal-body">
	        <div class="modal-body">

	          <h4>活动主题</h4>
	          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

	          <h4>活动时间</h4>
	          <p><a href="#" data-toggle="tooltip" title="Default tooltip">you probably</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>
	          
	          <h4>活动地点</h4>
	          <p><a href="#" class="tooltip-test" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

	          <div class="row">
			    <div class="col-md-6 ">
			                <h4>参与人数</h4>	
	           				<div class="bs-example tooltip-demo">
	    						<p>Tight pants next level keffiyeh <a href="#" data-toggle="tooltip" title="Default tooltip">you probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan</p>
	  		   				</div>
			    </div>

			    <div class="col-md-6">
			    			<h4>保证金</h4>	
			                <div class="bs-example tooltip-demo">
	    						<p>Tight pants next level keffiyeh <a href="#" data-toggle="tooltip" title="Default tooltip">you probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan</p>
	  		   				</div>
			    </div>
		   	  </div>

	          <h4>活动描述</h4>
	          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
	         
	          

	          <div class="form-group">
	            <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
	              <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
	            </button>

	            <div class="collapse" id="collapseExample" >
	                  <div id="has_TimeList" class="form-group">
	                      <div id="noneTimelist" >
	                      	<p></p>
	                        <p class="alert alert-info alert-dismissible">暂无活动安排</p> 
	                        <p class="alert alert-info alert-dismissible">暂无活动安排</p> 
	                      </div>
	                  </div>
	            </div>
	          </div>
	        </div>

	   
	      </div>
	      <div class="modal-footer">
	      	<div>
	      		<h4>申报人/申报时间</h4>
	        	<p>someone at time</p>
	    	</div>
	      	<button type="button" class="btn btn-success">通过</button>
	      	<button type="button" class="btn btn-warning">删除</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- detailMyActivityModal -->
	<div class="modal fade" id="detailMyActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">活动名称</h4>
	      </div>
	      <div class="modal-body">
	        <div class="modal-body">

	          <h4>活动主题</h4>
	          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

	          <h4>活动时间</h4>
	          <p><a href="#" data-toggle="tooltip" title="Default tooltip">you probably</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>
	          
	          <h4>活动地点</h4>
	          <p><a href="#" class="tooltip-test" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

	          <div class="row">
			    <div class="col-md-6 ">
			                <h4>参与人数</h4>	
	           				<div class="bs-example tooltip-demo">
	    						<p>Tight pants next level keffiyeh <a href="#" data-toggle="tooltip" title="Default tooltip">you probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan</p>
	  		   				</div>
			    </div>

			    <div class="col-md-6">
			    			<h4>保证金</h4>	
			                <div class="bs-example tooltip-demo">
	    						<p>Tight pants next level keffiyeh <a href="#" data-toggle="tooltip" title="Default tooltip">you probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan</p>
	  		   				</div>
			    </div>
		   	  </div>

	          <h4>活动描述</h4>
	          <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
	         
	          

	          <div class="form-group">
	            <button id="list_ActivityTime" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
	              <span id="list_ActivityTime_span" class="glyphicon glyphicon-menu-down" aria-hidden="true"> 活动时间安排 </span>
	            </button>

	            <div class="collapse" id="collapseExample2" >
	                  <div id="has_TimeList" class="form-group">
	                      <div id="noneTimelist" >
	                      	<p></p>
	                        <p class="alert alert-info alert-dismissible">暂无活动安排</p> 
	                        <p class="alert alert-info alert-dismissible">暂无活动安排</p> 
	                      </div>
	                  </div>
	            </div>
	          </div>
	        </div>

	   
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-warning">删除</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	      </div>
	    </div>
	  </div>
	</div>



</body>

</html>
