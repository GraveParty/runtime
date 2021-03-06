
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


        <!-- GenesisUI main scripts -->
<script src="{{ URL::asset('/') }}js/app.js"></script>
        <!-- Plugins and scripts required by this views -->
<script src="{{ URL::asset('/') }}js/libs/jquery.maskedinput.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/select2.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/daterangepicker.min.js"></script>
        <!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/forms.js"></script>


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
					<a class="nav-link " href="{{ URL::to('/activity') }}"><i class="icon-puzzle"></i> 最新活动</a>

				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ URL::to('/activity/myactivity') }}"><i class="icon-docs"></i> 我的活动</a>

				</li>
				<li class="nav-item">
					<a class="nav-link active" href="{{ URL::to('/activity/newactivity') }}"><i class="icon-graph"></i> 发布活动</a>

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
					<form  id="newActivity" action="/activity/newActivity" method="POST">
						{!! csrf_field() !!}
				        <div class="card">
					        <div class="card-header">
					          	<i>发布活动</i>
					        </div>


					        <div class="card-block">
					          <div class="form-group" >
					             <label for="exampleInputEmail1">活动主题</label>
					             <input type="text" class="form-control"  name="theme"  id="exampleInputEmail1" placeholder="主题名称">
					          </div>


					          <div class="form-group" >
						        <fieldset class="form-group">
		                            <label>活动时间</label>
		                                <div class="input-group">
		                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		                                    <input name="daterange" class="form-control" type="text">
		                                </div>
		                        </fieldset>
							  </div>
					          
					          <div class="form-group">
					              <label for="exampleInputPassword1">活动地点</label>
					              <input  class="form-control" id="activityField" name="activityField" placeholder="省/市/区/地点描述">
					          </div>
					           
					          

					          
					           <div class="form-group">
					              <label for="exampleInputPassword1">活动详情</label>
					               <input type="hidden" id="descriptionInfo" name="descriptionInfo" value=""></input> 
					              <textarea id="description"  class="form-control" rows="5" placeholder="活动描述"></textarea>
					           </div>
					          

					          <div class="row">
					            <div class="col-md-2 ">
					              <div class="form-group">
					                <label for="exampleInputPassword1">人数</label>
					                <div class="input-group">
					                  <input type="text" name="peopleNumber"  class="form-control" placeholder="0" aria-describedby="basic-addon1">
					                  <span class="input-group-addon" id="basic-addon1">人</span>
					                </div>
					              </div>
					            </div>

					            <div class="col-md-2">
					              <div class="form-group">
					                <label for="exampleInputPassword1">保证金</label>
					                <div class="input-group">
					                  <input type="text" name="money" class="form-control" placeholder="0" aria-describedby="basic-addon1">
					                  <span class="input-group-addon" id="basic-addon1">元</span>
					                </div>
					              </div>
					            </div>
					          </div>



						        <div class="form-group">
						            <button id="list_ActivityTime" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Left Align">
						              <span id="list_ActivityTime_span" class="fa fa-angle-double-down" aria-hidden="true"> 活动时间安排 </span>
						            </button>

						            <div class="collapse" id="collapseExample" >
						            	 <a style="heigth:2px">&nbsp</a>
						                <div class="card ">
						                 <div class="card-header">
						                  <label for="exampleInputPassword1" class="text-center">已有时间安排</label>
						                  

						                    <div id="has_TimeList" class="form-group">
						                      <div id="noneTimelist" class="alert alert-success alert-dismissible" role="alert">
						                        <p id="list0">暂无活动安排</p> 
						                        <input type="hidden" name="listInfo" id="listInfo" value=""></input> 
						                      </div>
						                    
						                    </div>

						                  
										  
						                  <hr style="height:4px; border-top:1px solid #555555" />
						                  
						        

						                
						                  	<label for="exampleInputPassword1" class="text-center">新增时间安排</label>
						                  	<div class="card card-local">
						                 	    <div class="card-header">
						                    		<div class="form-group" >
												        <fieldset class="form-group">
								                            <label>活动时间</label>
								                                <div class="input-group">
								                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								                                    <input name="daterange" class="form-control" type="text" id="newTimeRange">
								                                </div>
								                        </fieldset>
													</div>
						                    

							                   		<div class="form-group">
							                     		 <input id="new_TimeListContent" type="text" class="form-control" id="exampleInputPassword1" placeholder="活动内容描述">
							                    	</div>

								                    <div class="row">
								                        <div class="col-md-4 col-md-offset-10">
								                          <div class="input-group">
								                            <button  id="add_TimeList" class="btn btn-success" type="button" onclick="addTimeList()">
								                              <span class="fa fa-plus" > 添加</span>
								                            </button>
								                          </div> 
								                        </div>
								                    </div> 
							                    </div>
						                  	</div> 
						                 </div>
							            </div>
							        </div>
							    </div> 


							     <fieldset class="form-group">
			                         <label>标签选择</label>
			                            <div class="controls">
			                            	<input type="hidden" name="tagInfo"id="tagInfo" value=""></input> 
			                                <select id="select2-1" class="form-control" size="5" multiple>
			                                    <option>户外</option>
			                                    <option selected>室内</option>
			                                    <option>集体</option>
			                                    <option>个人</option>
			                                    <option>江苏</option>
			                                </select>
			                            </div>
			                     </fieldset>  
		                    </div>

		                    <div class="card-footer">
		                    	<div class="row">
									<div class="col-md-2 col-md-offset-8"></div>
										<button type="button" class="btn btn-success"  aria-label="Left Align" onclick="subForm()">

									   	 	<span class="fa fa-check" aria-hidden="true"> Submit </span>
										</button>
									</div> 
								</div> 
							</div> 


	              
					    </div>

	                 	

					
					      
					</form>
				</div>
				
			

			
			
				<!-- main content -->
			</div>
		</div>


	</main>
<script>
	var listNumber=0;
	function subForm(){
		var content="";
		var count="";


		for (var i = 1; i <= listNumber; i++) {
					count="list"+i;
					if(document.getElementById(count)){
						content = content+ (document.getElementById(count).innerText+";");
					}

		};

		var listInfo = document.getElementById("listInfo");
		listInfo.value =content;


		var tagChoose = document.getElementById("select2-1");
		var tagsInfo = document.getElementById("tagInfo");

		for(var i=0;i<5;i++){     
                if(tagChoose.options[i].selected){  
                    tagsInfo.value+=tagChoose.options[i].value+";";  
                }  
  		}  



		alert(tagsInfo.value);


		var description = document.getElementById("description");
		var descriptionInfo = document.getElementById("descriptionInfo");
		descriptionInfo.value=description.value;

		var subForm = document.getElementById("newActivity");
		subForm.submit();


	}



	function addTimeList(){

		listNumber+=1;

        var input_Content = document.getElementById("new_TimeListContent");


        var startTime = document.getElementById("newTimeRange").value;

        

        var content =startTime+" : "+input_Content.value;
        var hasList = document.getElementById("has_TimeList");
        var noneTimeList = document.getElementById("noneTimelist");
        
        noneTimeList.style.display="none";  

        hasList.innerHTML +=  "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-"+"dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><p id=list"+listNumber+">" + content +"</p></div>" ;
     

	}

</script>


</body>

</html>
