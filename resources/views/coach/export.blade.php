
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="css/bootstrap.css" rel="stylesheet" media="screen"> -->
	<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
	{{--
    <link href="{{ URL::asset('/') }}css/bootstrap.min.css" rel="stylesheet"
        --}}
	{{--media="screen">
--}}
	<link href="{{ URL::asset('/') }}css/main.css" rel="stylesheet"
		  media="screen">
	<link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet"
		  media="screen">
	<link href="{{ URL::asset('/') }}css/select2.min.css" rel="stylesheet"
		  media="screen">
	<link rel="stylesheet" type="text/css" href="http://localhost:8000/sweetalert/dist/sweetalert.css">

	<script src="http://localhost:8000/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript"
			src="{{ URL::asset('/') }}js/bootstrap.js"></script>
	{{--
    <script src="http://localhost:8000/js/app.js"></script>
    --}} {{--
<!-- Plugins and scripts required by this views -->
--}}
	<script src="http://localhost:8000/js/libs/jquery.maskedinput.min.js"></script>
	{{--
    <script src="http://localhost:8000/js/libs/moment.min.js"></script>
    --}}
	<script src="http://localhost:8000/js/libs/select2.min.js"></script>
	<script src="http://localhost:8000/js/libs/daterangepicker.min.js"></script>
	{{--
    <!-- Custom scripts required by this view -->
    --}}
	<script src="http://localhost:8000/js/views/forms.js"></script>
	<script type="text/javascript" src="http://localhost:8000/js/Chart.js"></script>


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
		<button class="navbar-toggler mobile-toggler hidden-lg-up"
				type="button">&#9776;</button>
		<a class="navbar-brand" href="#"></a>
		<ul class="nav navbar-nav hidden-md-down">
			<li class="nav-item"><a
						class="nav-link navbar-toggler layout-toggler" href="#">☰</a></li>
			<li class="nav-item p-x-1"><a class="nav-link"
										  href="{{ URL::to('/coach/export') }}">教练</a></li>
		</ul>
		<ul class="nav navbar-nav pull-right hidden-md-down">
			<li class="nav-item dropdown"><a
						class="nav-link dropdown-toggle nav-link" data-toggle="dropdown"
						href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="hidden-md-down">{{ Auth::user()->nickname }}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">

					<div class="dropdown-header text-xs-center">
						<strong>设置</strong>
					</div>
					<a class="dropdown-item" href="{{ URL::to('/personal') }}"><i
								class="fa fa-user"></i> 个人设置</a> <a class="dropdown-item"
																	href="{{ URL::to('/logout') }}"><i class="fa fa-lock"></i> 退出登录</a>
				</div></li>

		</ul>
	</div>
</header>

{{--
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    --}} {{--
		<div class="container-fluid">
			--}} {{--
			<div class="navbar-header">
				--}} {{--
				<button class="navbar-toggle collapsed" type="button"
					--}}
{{--data-toggle="collapse" data-target="#collapse-header">
--}} {{--<span class="sr-only">Toggle navigation</span>
					<span-- }}
						{{--class="icon-bar"> </span> <span class="icon-bar"></span> <span--
						}}
						{{--class="icon-bar"> </span>--}} {{-- 
				
				</button>
				--}} {{--<a class="navbar-brand" href="#">RunTime</a>--}} {{--
			</div>
			--}} {{--
			<div class="navbar-collapse collapse" role="navigation"
				--}}
{{--id="collapse-header">
--}} {{--
				<ul class="nav navbar-nav">
					--}} {{--
					<li class="active"><a href="{{ URL::to('/coach') }}">教练</a></li>--}}
{{--
</ul>
--}} {{--
				<ul class="nav navbar-nav navbar-right">
					--}} {{--
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"
						--}}
{{--role="button">{{ Auth::user()->nickname }}<span class="caret"></span></a>--}}
{{--
<ul class="dropdown-menu">
    --}} {{--
							<li><a href="/personal">个人设置</a></li>--}} {{--
							<li role="separator" class="divider"></li>--}} {{--
							<li><a href="{{ URL::to('/logout') }}">退出登录</a></li>--}} {{--
						</ul></li>--}} {{--
				</ul>
				--}} {{--
			</div>
			--}} {{--
		</div>
		--}} {{--
	</nav>
	--}}


<!-- sidebar -->
<div class="sidebar">
	<nav class="sidebar-nav">
		<ul class="nav">
			<li class="nav-title">
				建议
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="{{ URL::to('/coach/export') }}"><i class="icon-puzzle"></i> 查看申请</a>

			</li>
			<li class="nav-title">
				文章
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/weibo/myweibo') }}"><i class="icon-notebook"></i> 我的文章</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ URL::to('/weibo/create') }}"><i class="icon-pencil"></i> 发布文章</a>

			</li>
		</ul>
	</nav>
</div>


<!-- main -->
<main class="main">
	<div class="container-fluid">
		<div class="row">
			<!-- main content -->
			<div class="col-md-12" id="list">
				@if(count($questionsToMe)>0) @for($i=0;$i <
				count($questionsToMe);$i++)
					<div class="card card-local">
						<div class="card-header">
							<code>对我提问</code>
							<strong>问题：</strong><?php echo $questionsToMe[$i]->title; ?>
						</div>
						<div class="card-block">
							<strong>描述：</strong> <br /><?php echo $questionsToMe[$i]->content; ?>
							<hr>
							<strong>申请用户：</strong><?php echo $userNamesToMe[$i]; ?>
							<br /> <strong>个人信息：</strong><br /><?php echo $userDataToMe[$i]; ?>
						</div>
						<div class="card-footer">
							<button class="btn btn-success-outline col-md-offset-11"
									id="<?php echo $questionsToMe[$i]->userid; ?>;<?php echo $questionsToMe[$i]->id; ?>;<?php echo $questionsToMe[$i]->content; ?>;<?php echo $userDataToMe[$i]; ?>"
									onclick="reply(this.id)">回复</button>
						</div>
					</div>
				@endfor @endif @if(count($questionsToAll)>0) @for($i=0;$i <
				count($questionsToAll);$i++)
					<div class="card card-local">
						<div class="card-header">
							<strong>问题：</strong><?php echo $questionsToAll[$i]->title; ?>
						</div>
						<div class="card-block">
							<strong>描述：</strong> <br /><?php echo $questionsToAll[$i]->content; ?>
							<hr>
							<strong>申请用户：</strong><?php echo $userNamesToAll[$i]; ?> <br /> <strong>个人信息：</strong><br /><?php echo $userDataToAll[$i]; ?>
						</div>
						<div class="card-footer">
							<button class="btn btn-success-outline col-md-offset-11"
									id="<?php echo $questionsToAll[$i]->userid; ?>;<?php echo $questionsToAll[$i]->id; ?>;<?php echo $questionsToAll[$i]->content; ?>;<?php echo $userDataToAll[$i]; ?>"
									onclick="reply(this.id)">回复</button>
						</div>
					</div>
				@endfor @endif
			</div>

			<div id="reply" style="display: none;" class="col-md-8">
				<form class="form" method="POST" action="/coach/reply" id="form">
					{!! csrf_field() !!}
					<div class="card card-local">
						<div class="card-header">问题描述/用户信息</div>
						<div class="card-block">
							<div>
								<strong>问题：</strong><span id="question"></span>
							</div>
							<div>
								<strong>用户信息：</strong><br /> <span id="infomation"></span>
							</div>
						</div>
					</div>
					<div class="card card-local">
						<div class="card-header">
							输入您的<strong> 回复 </strong>，也可以添加<strong> 食谱 </strong>或者<strong>
								健身建议 </strong>
						</div>
						<div class="card-block">
							<textarea class="form-control" rows="6" style="resize: none;"
									  name="replyArea" id="replyArea"></textarea>
							<input type="hidden" name="oneDayRecipesInput"
								   id="oneDayRecipesInput"> <input type="hidden"
																   name="oneWeekRecipesInput" id="oneWeekRecipesInput"> <input
									type="hidden" name="exerciseItemsInput" id="exerciseItemsInput"><input
									type="hidden" name="userId" id="userId"><input type="hidden"
																				   name="questionId" id="questionId">
						</div>
						<div class="card-footer">
							<a class="btn btn-success-outline" role="button"
							   data-toggle="modal" data-target="#oneDayRecipe"
							   onclick="setOneDayRecipeModal('-1')"> <strong>添加</strong>一个<strong>
									一天 </strong>的<strong> 食谱 </strong></a> <a
									class="btn btn-success-outline" role="button"
									data-toggle="modal" data-target="#oneWeekRecipe"
									onclick="setOneWeekRecipeModal('-1')"> <strong>添加</strong>一个<strong>
									一周 </strong>的<strong> 食谱 </strong></a> <a
									class="btn btn-success-outline" role="button"
									data-toggle="modal" data-target="#exercisePlan"
									onclick="setExerciseItem('-1')"> <strong>添加</strong>一条<strong>
									健身建议 </strong>
							</a>
						</div>
					</div>

					<div id="planResult"></div>

					<div class="card card-local">
						<div class="card-block">
							<button type="button"
									class="btn btn-success-outline btn btn-block"
									onclick="customSubmit()">提交</button>
							<button type="button" class="btn btn-secondary btn btn-block"
									onclick="reply('-1')">取消</button>
						</div>
					</div>

					<div class="modal fade" id="oneDayRecipe" tabindex="-1"
						 role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title">
										<span id="oneDayRecipeTitle" style="display: none;"></span>一天的食谱
									</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">主题</div>
											<input type="text" class="form-control" id="oneDaySubject">
										</div>
									</div>
									<hr />
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">早餐</div>
											<input type="text" class="form-control" id="oneDayBreakfast">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">午餐</div>
											<input type="text" class="form-control" id="oneDayLunch">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">晚餐</div>
											<input type="text" class="form-control" id="oneDayDinner">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
											data-dismiss="modal">取消</button>
									<button type="button" class="btn btn-success-outline"
											data-dismiss="modal" id="oneDayRecipeModalConfirm"
											onclick="oneDayRecipe()">添加</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="oneWeekRecipe" tabindex="-1"
						 role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title">
										<span id="oneWeekRecipeTitle" style="display: none;"></span>一周的食谱
									</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">主题</div>
											<input type="text" class="form-control" id="oneWeekSubject">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周一</div>
											<input type="text" class="form-control" id="mondayBreakfast"
												   placeholder="早餐"> <input type="text" class="form-control"
																			id="mondayLunch" placeholder="午餐"> <input type="text"
																													  class="form-control" id="mondayDinner" placeholder="晚餐">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周二</div>
											<input type="text" class="form-control" id="tuesdayBreakfast"
												   placeholder="早餐"> <input type="text" class="form-control"
																			id="tuesdayLunch" placeholder="午餐"> <input type="text"
																													   class="form-control" id="tuesdayDinner" placeholder="晚餐">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周三</div>
											<input type="text" class="form-control"
												   id="wednesdayBreakfast" placeholder="早餐"> <input type="text"
																									class="form-control" id="wednesdayLunch" placeholder="午餐"> <input
													type="text" class="form-control" id="wednesdayDinner"
													placeholder="晚餐">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周四</div>
											<input type="text" class="form-control"
												   id="thursdayBreakfast" placeholder="早餐"> <input type="text"
																								   class="form-control" id="thursdayLunch" placeholder="午餐"> <input
													type="text" class="form-control" id="thursdayDinner"
													placeholder="晚餐">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周五</div>
											<input type="text" class="form-control" id="fridayBreakfast"
												   placeholder="早餐"> <input type="text" class="form-control"
																			id="fridayLunch" placeholder="午餐"> <input type="text"
																													  class="form-control" id="fridayDinner" placeholder="晚餐">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周六</div>
											<input type="text" class="form-control"
												   id="saturdayBreakfast" placeholder="早餐"> <input type="text"
																								   class="form-control" id="saturdayLunch" placeholder="午餐"> <input
													type="text" class="form-control" id="saturdayDinner"
													placeholder="晚餐">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">周日</div>
											<input type="text" class="form-control" id="sundayBreakfast"
												   placeholder="早餐"> <input type="text" class="form-control"
																			id="sundayLunch" placeholder="午餐"> <input type="text"
																													  class="form-control" id="sundayDinner" placeholder="晚餐">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
											data-dismiss="modal">取消</button>
									<button type="button" class="btn btn-success-outline"
											data-dismiss="modal" id="oneWeekRecipeModalConfirm"
											onclick="oneWeekRecipe()">添加</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="exercisePlan" tabindex="-1"
						 role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title">
										<span id="exercisePlanTitle" style="display: none;"></span>一条健身建议
									</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-md-2">运动日期</div>
										<div class="col-md-2">时间段</div>
										<div class="col-md-2">具体运动</div>
										<div class="col-md-2">运动组数</div>
										<div class="col-md-2">运动量</div>
										<div class="col-md-2">运动单位</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<select class="form-control" id="exerciseDate"
													onchange="exerciseHideOrShow(this.id)">
												<option>不限制</option>
												<option>工作日</option>
												<option>周末</option>
												<option>周一</option>
												<option>周二</option>
												<option>周三</option>
												<option>周四</option>
												<option>周五</option>
												<option>周六</option>
												<option>周日</option>
												<option>自定义</option>
											</select>
										</div>
										<div class="col-md-2">
											<select class="form-control" id="exerciseTime"
													onchange="exerciseHideOrShow(this.id)">
												<option>不限制</option>
												<option>早晨</option>
												<option>上午</option>
												<option>中午</option>
												<option>下午</option>
												<option>傍晚</option>
												<option>晚上</option>
												<option>自定义</option>
											</select>
										</div>
										<div class="col-md-2">
											<select class="form-control" id="exerciseName"
													onchange="exerciseHideOrShow(this.id)">
												<option>慢跑</option>
												<option>俯卧撑</option>
												<option>深蹲</option>
												<option>仰卧起坐</option>
												<option>自定义</option>
											</select>
										</div>
										<div class="col-md-2">
											<div class="input-group">
												<input type="number" class="form-control" placeholder="组数"
													   id="exerciseGroup">
												<div class="input-group-addon">组</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="input-group">
												<input type="number" class="form-control" placeholder="量"
													   id="exerciseValue">
											</div>
										</div>
										<div class="col-md-2">
											<select class="form-control" id="exerciseUnit"
													onchange="exerciseHideOrShow(this.id)">
												<option>米</option>
												<option>千米</option>
												<option>个</option>
												<option>分钟</option>
												<option>小时</option>
												<option>自定义</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="自定义日期"
												   id="customExerciseDate" style="display: none;">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="自定义时间段"
												   id="customExerciseTime" style="display: none;">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="自定义运动"
												   id="customExerciseName" style="display: none;">
										</div>
										<div class="col-md-4"></div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="单位"
												   id="customExerciseUnit" style="display: none;">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
											data-dismiss="modal">取消</button>
									<button type="button" class="btn btn-success-outline"
											data-dismiss="modal" id="exercisePlanConfirmButton"
											onclick="oneExerciseItem()">添加</button>
								</div>
							</div>
						</div>
					</div>

				</form>
			</div>


			<!-- main content -->
			<div id="myReply" class="col-md-4" style="display: none;">
				<div class="card card-local" style="height: 300px; overflow: auto;">
					<div class="card-header">我回复过的食谱</div>
					<div class="card-block">
						<table class="table table-hover">
							<tr>
								<th>食谱</th>
								<th>操作</th>
							</tr>
							@if(count($oneDayRecipes)>0) @for($i=0;$i <
							count($oneDayRecipes);$i++)
								<tr align="left">
									<td>
									<!--  								<a style="cursor: pointer;" tabindex="0" role="button" data-placement="bottom" data-toggle="popover" data-trigger="focus" title="一天食谱" data-content="<?php echo $oneDayRecipes[$i]; ?>" data-html="true">一天——<?php echo explode("<br/>", $oneDayRecipes[$i])[0]; ?></a>-->
										一天——<?php echo explode("<br/>", $oneDayRecipes[$i])[0]; ?>
									</td>
									<td><a style="cursor: pointer; color: green;"
										   id="<?php echo $oneDayRecipes[$i]; ?>"
										   onclick="addOneDayRecipeFromHistory(this.id)">添加</a></td>
								</tr>
							@endfor @endif
							<tr></tr>
							@if(count($oneWeekRecipes)>0) @for($i=0;$i <
							count($oneWeekRecipes);$i++)
								<tr align="left">
									<td>
										一周——<?php echo explode("<br/>", $oneWeekRecipes[$i])[0]; ?>
									</td>
									<td><a style="cursor: pointer; color: green;"
										   id="<?php echo $oneWeekRecipes[$i]; ?>"
										   onclick="addOneWeekRecipeFromHistory(this.id)">添加</a></td>
								</tr>
							@endfor @endif
						</table>
					</div>
				</div>

				<div class="card card-local" style="height: 300px; overflow: auto;">
					<div class="card-header">我回复过的健身建议</div>
					<div class="card-block">
						<table class="table table-hover">
							<tr>
								<th>建议</th>
								<th>操作</th>
							</tr>
							@if(count($exerciseItems)>0) @for($i=0;$i <
							count($exerciseItems);$i++)
								<tr align="left">
									<td>
										<?php echo explode(" ", $exerciseItems[$i])[2]; ?>
									</td>
									<td><a style="cursor: pointer; color: green;"
										   id="<?php echo $exerciseItems[$i]; ?>"
										   onclick="addExerciseItemFromHistory(this.id)">添加</a></td>
								</tr>
							@endfor @endif
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>



<script>
	var index = 0;
	var array = new Array();

	$(function () {
		$('[data-toggle="popover"]').popover()
	})

	function customSubmit() {
		for(var i = 0;i < array.length; i++){
			if(array[i] == "oneDayRecipe") {
				var oneDaySubject = document.getElementById("oneDaySubjectAdded" + i).innerText;
				var oneDayBreakfast = document.getElementById("oneDayBreakfastAdded" + i).innerText;
				var oneDayLunch = document.getElementById("oneDayLunchAdded" + i).innerText;
				var oneDayDinner = document.getElementById("oneDayDinnerAdded" + i).innerText;

				document.getElementById("oneDayRecipesInput").value += "主题：" + oneDaySubject + "<br/>早餐：" + oneDayBreakfast
						+ "<br/>午餐：" + oneDayLunch + "<br/>晚餐：" + oneDayDinner +";";
			} else if(array[i] == "oneWeekRecipe") {
				var oneWeekSubject = document.getElementById("oneWeekSubjectAdded" + i).innerText;
				var mondayBreakfast = document.getElementById("mondayBreakfastAdded" + i).innerText;
				var mondayLunch = document.getElementById("mondayLunchAdded" + i).innerText;
				var mondayDinner = document.getElementById("mondayDinnerAdded" + i).innerText;
				var tuesdayBreakfast = document.getElementById("tuesdayBreakfastAdded" + i).innerText;
				var tuesdayLunch = document.getElementById("tuesdayLunchAdded" + i).innerText;
				var tuesdayDinner = document.getElementById("tuesdayDinnerAdded" + i).innerText;
				var wednesdayBreakfast = document.getElementById("wednesdayBreakfastAdded" + i).innerText;
				var wednesdayLunch = document.getElementById("wednesdayLunchAdded" + i).innerText;
				var wednesdayDinner = document.getElementById("wednesdayDinnerAdded" + i).innerText;
				var thursdayBreakfast = document.getElementById("thursdayBreakfastAdded" + i).innerText;
				var thursdayLunch = document.getElementById("thursdayLunchAdded" + i).innerText;
				var thursdayDinner = document.getElementById("thursdayDinnerAdded" + i).innerText;
				var fridayBreakfast = document.getElementById("fridayBreakfastAdded" + i).innerText;
				var fridayLunch = document.getElementById("fridayLunchAdded" + i).innerText;
				var fridayDinner = document.getElementById("fridayDinnerAdded" + i).innerText;
				var saturdayBreakfast = document.getElementById("saturdayBreakfastAdded" + i).innerText;
				var saturdayLunch = document.getElementById("saturdayLunchAdded" + i).innerText;
				var saturdayDinner = document.getElementById("saturdayDinnerAdded" + i).innerText;
				var sundayBreakfast = document.getElementById("sundayBreakfastAdded" + i).innerText;
				var sundayLunch = document.getElementById("sundayLunchAdded" + i).innerText;
				var sundayDinner = document.getElementById("sundayDinnerAdded" + i).innerText;

				document.getElementById("oneWeekRecipesInput").value += "主题：" + oneWeekSubject + "<br/>周一：<br/>早餐：" + mondayBreakfast + "<br/>午餐：" + mondayLunch + "<br/>晚餐：" + mondayDinner
						+ "<br/>周二：<br/>早餐：" + tuesdayBreakfast + "<br/>午餐：" + tuesdayLunch + "<br/>晚餐：" + tuesdayDinner
						+ "<br/>周三：<br/>早餐：" + wednesdayBreakfast + "<br/>午餐：" + wednesdayLunch + "<br/>晚餐：" + wednesdayDinner
						+ "<br/>周四：<br/>早餐：" + thursdayBreakfast + "<br/>午餐：" + thursdayLunch + "<br/>晚餐：" + thursdayDinner
						+ "<br/>周五：<br/>早餐：" + fridayBreakfast + "<br/>午餐：" + fridayLunch + "<br/>晚餐：" + fridayDinner
						+ "<br/>周六：<br/>早餐：" + saturdayBreakfast + "<br/>午餐：" + saturdayLunch + "<br/>晚餐：" + saturdayDinner
						+ "<br/>周日：<br/>早餐：" + sundayBreakfast + "<br/>午餐：" + sundayLunch + "<br/>晚餐：" + sundayDinner + ";";
			} else if (array[i] == "oneExerciseItem") {
				var exerciseDate = document.getElementById("exerciseDateAdded" + i).innerText;
				var exerciseTime = document.getElementById("exerciseTimeAdded" + i).innerText;
				var exerciseName = document.getElementById("exerciseNameAdded" + i).innerText;
				var exerciseGroup = document.getElementById("exerciseGroupAdded" + i).innerText;
				var exerciseValue = document.getElementById("exerciseValueAdded" + i).innerText;
				var exerciseUnit = document.getElementById("exerciseUnitAdded" + i).innerText;

				document.getElementById("exerciseItemsInput").value += exerciseDate +" "+ exerciseTime +" "+ exerciseName +" "+ exerciseGroup + " 组，每组 " + exerciseValue +" "+ exerciseUnit + ";";
			}
		};
		swal({
					title: "回复成功！",
					text: "即将跳转至申请列表",
					type: "success",
					showCancelButton: false,
					confirmButtonColor: "#90EE90",
					confirmButtonText: "OK",
					closeOnConfirm: true },
				function(){
					var form = document.getElementById("form");
					form.submit();
				});
	}

	function addExerciseItemFromHistory(id) {
		var items = id.split(" ");

		var planResult = document.getElementById("planResult");
		planResult.innerHTML +=
				"<div class='card card-local'>"
				+ "<div class='card-header'>"
				+ "一条健身建议"
				+ "<div class='card-actions'>"
				+ "<a class='btn-minimize collapsed' data-toggle='collapse' href='#collapseExample" + index + "' aria-expanded='true' aria-controls='collapseExample"+index+"'><i class='icon-arrow-up'></i></a>"
				+ "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#exercisePlan' id='" + index + "' onclick='setExerciseItem(this.id)'>修改</button>"
				+ "<a class='btn-close' href='#' id='removeButton:" + index + "' onclick='customRemove(this.id)'><i class='icon-close'></i></a>"
				+ "</div></div>"
				+ "<div class='card-block collapse' id='collapseExample"+index+"'>"
				+ "<span id='exerciseDateAdded" + index + "'>" + items[0] + "</span>"
				+ "<span id='exerciseTimeAdded" + index + "'>" + items[1] + "</span>"
				+ "<span id='exerciseNameAdded" + index + "'>" + items[2] + "</span>"
				+ "<span id='exerciseGroupAdded" + index + "'>" + items[3] + "</span>组，每组"
				+ "<span id='exerciseValueAdded" + index + "'>" + items[5] + "</span>"
				+ "<span id='exerciseUnitAdded" + index + "'>" + items[6] + "</span>"
				+"</div></div>";

		array[index] = "oneExerciseItem";
		index ++ ;
	}

	function addOneDayRecipeFromHistory(id) {
		var items = id.split("<br/>");

		var planResult = document.getElementById("planResult");
		planResult.innerHTML +=
				"<div class='card card-local'>"
				+ "<div class='card-header'>"
				+ "一条一天的食谱"
				+ "<div class='card-actions'>"
				+ "<a class='btn-minimize collapsed' data-toggle='collapse' href='#collapseExample" + index + "' aria-expanded='true' aria-controls='collapseExample"+index+"'><i class='icon-arrow-up'></i></a>"
				+ "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#oneDayRecipe' id='" + index + "' onclick='setOneDayRecipeModal(this.id)'>修改</button>"
				+ "<a class='btn-close' href='#' id='removeButton:" + index + "' onclick='customRemove(this.id)'><i class='icon-close'></i></a>"
				+ "</div></div>"
				+ "<div class='card-block collapse' id='collapseExample"+index+"'>"
				+ "<strong>主题： </strong> <span id='oneDaySubjectAdded" + index + "'>" + items[0].split("：")[1] + "</span>"
				+ "<br /><strong>早餐： </strong> <span id='oneDayBreakfastAdded" + index + "'>" + items[1].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='oneDayLunchAdded" + index + "'>" + items[2].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='oneDayDinnerAdded" + index + "'>" + items[3].split("：")[1] + "</span>"
				+"</div></div>";

		array[index] = "oneDayRecipe";
		index ++ ;
	}

	function addOneWeekRecipeFromHistory(id) {
		var items = id.split("<br/>");

		var planResult = document.getElementById("planResult");
		planResult.innerHTML +=
				"<div class='card card-local'>"
				+ "<div class='card-header'>"
				+ "一条一周的食谱"
				+ "<div class='card-actions'>"
				+ "<a class='btn-minimize collapsed' data-toggle='collapse' href='#collapseExample" + index + "' aria-expanded='true' aria-controls='collapseExample"+index+"'><i class='icon-arrow-up'></i></a>"
				+ "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#oneWeekRecipe' id='" + index + "' onclick='setOneWeekRecipeModal(this.id)'>修改</button>"
				+ "<a class='btn-close' href='#' id='removeButton:" + index + "' onclick='customRemove(this.id)'><i class='icon-close'></i></a>"
				+ "</div></div>"
				+ "<div class='card-block collapse' id='collapseExample"+index+"'>"
				+ "<strong>主题： </strong> <span id='oneWeekSubjectAdded" + index + "'>" + items[0].split("：")[1] + "</span>"
				+ "<br /><strong>周一： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='mondayBreakfastAdded" + index + "'>" + items[2].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='mondayLunchAdded" + index + "'>" + items[3].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='mondayDinnerAdded" + index + "'>" + items[4].split("：")[1] + "</span>"
				+ "<br /><strong>周二： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='tuesdayBreakfastAdded" + index + "'>" + items[6].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='tuesdayLunchAdded" + index + "'>" + items[7].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='tuesdayDinnerAdded" + index + "'>" + items[8].split("：")[1] + "</span>"
				+ "<br /><strong>周三： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='wednesdayBreakfastAdded" + index + "'>" + items[10].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='wednesdayLunchAdded" + index + "'>" + items[11].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='wednesdayDinnerAdded" + index + "'>" + items[12].split("：")[1] + "</span>"
				+ "<br /><strong>周四： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='thursdayBreakfastAdded" + index + "'>" + items[14].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='thursdayLunchAdded" + index + "'>" + items[15].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='thursdayDinnerAdded" + index + "'>" + items[16].split("：")[1] + "</span>"
				+ "<br /><strong>周五： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='fridayBreakfastAdded" + index + "'>" + items[18].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='fridayLunchAdded" + index + "'>" + items[19].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='fridayDinnerAdded" + index + "'>" + items[20].split("：")[1] + "</span>"
				+ "<br /><strong>周六： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='saturdayBreakfastAdded" + index + "'>" + items[22].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='saturdayLunchAdded" + index + "'>" + items[23].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='saturdayDinnerAdded" + index + "'>" + items[24].split("：")[1] + "</span>"
				+ "<br /><strong>周日： </strong>"
				+ "<br /><strong>早餐： </strong> <span id='sundayBreakfastAdded" + index + "'>" + items[26].split("：")[1] + "</span>"
				+ "<br /><strong>午餐： </strong> <span id='sundayLunchAdded" + index + "'>" + items[27].split("：")[1] + "</span>"
				+ "<br /><strong>晚餐： </strong> <span id='sundayDinnerAdded" + index + "'>" + items[28].split("：")[1] + "</span>"
				+"</div></div>";

		array[index] = "oneWeekRecipe";
		index ++ ;
	}

	function customRemove(id) {
		var number = parseInt(id.split(":")[1]);
		array[number] = "";
	}

	function exerciseHideOrShow(id) {
		var element = document.getElementById(id).value;
		if (id == "exerciseDate") {
			if (element == "自定义") {
				document.getElementById("customExerciseDate").style.display=""
			} else {
				document.getElementById("customExerciseDate").style.display="none"
			}
		} else if (id == "exerciseTime") {
			if (element == "自定义") {
				document.getElementById("customExerciseTime").style.display=""
			} else {
				document.getElementById("customExerciseTime").style.display="none"
			}
		} else if (id == "exerciseName") {
			if (element == "自定义") {
				document.getElementById("customExerciseName").style.display=""
			} else {
				document.getElementById("customExerciseName").style.display="none"
			}
		} else if (id == "exerciseUnit") {
			if (element == "自定义") {
				document.getElementById("customExerciseUnit").style.display=""
			} else {
				document.getElementById("customExerciseUnit").style.display="none"
			}
		}
	};

	function oneExerciseItem() {
		var exerciseDate = document.getElementById("exerciseDate").value;
		if (exerciseDate == "自定义")exerciseDate = document.getElementById("customExerciseDate").value;
		if (exerciseDate == "不限制")exerciseDate = "";

		var exerciseTime = document.getElementById("exerciseTime").value;
		if (exerciseTime == "自定义")exerciseTime = document.getElementById("customExerciseTime").value;
		if (exerciseTime == "不限制")exerciseTime = "";

		var exerciseName = document.getElementById("exerciseName").value;
		if (exerciseName == "自定义")exerciseName = document.getElementById("customExerciseName").value;

		var exerciseGroup = document.getElementById("exerciseGroup").value;

		var exerciseValue = document.getElementById("exerciseValue").value;

		var exerciseUnit = document.getElementById("exerciseUnit").value;
		if (exerciseUnit == "自定义") exerciseUnit = document.getElementById("customExerciseUnit").value;

		var title = document.getElementById("exercisePlanTitle").innerText;
		if(title == "添加") {
			var planResult = document.getElementById("planResult");
			planResult.innerHTML +=
					"<div class='card card-local'>"
					+ "<div class='card-header'>"
					+ "一条健身建议"
					+ "<div class='card-actions'>"
					+ "<a class='btn-minimize collapsed' data-toggle='collapse' href='#collapseExample" + index + "' aria-expanded='true' aria-controls='collapseExample"+index+"'><i class='icon-arrow-up'></i></a>"
					+ "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#exercisePlan' id='" + index + "' onclick='setExerciseItem(this.id)'>修改</button>"
					+ "<a class='btn-close' href='#' id='removeButton:" + index + "' onclick='customRemove(this.id)'><i class='icon-close'></i></a>"
					+ "</div></div>"
					+ "<div class='card-block collapse' id='collapseExample"+index+"'>"
					+ "<span id='exerciseDateAdded" + index + "'>" + exerciseDate + "</span>"
					+ "<span id='exerciseTimeAdded" + index + "'>" + exerciseTime + "</span>"
					+ "<span id='exerciseNameAdded" + index + "'>" + exerciseName + "</span>"
					+ "<span id='exerciseGroupAdded" + index + "'>" + exerciseGroup + "</span>组，每组"
					+ "<span id='exerciseValueAdded" + index + "'>" + exerciseValue + "</span>"
					+ "<span id='exerciseUnitAdded" + index + "'>" + exerciseUnit + "</span>"
					+"</div></div>";

			array[index] = "oneExerciseItem";
			index ++ ;
		} else {
			document.getElementById("exerciseDateAdded" + title).innerText = exerciseDate;
			document.getElementById("exerciseTimeAdded" + title).innerText = exerciseTime;
			document.getElementById("exerciseNameAdded" + title).innerText = exerciseName;
			document.getElementById("exerciseGroupAdded" + title).innerText = exerciseGroup;
			document.getElementById("exerciseValueAdded" + title).innerText = exerciseValue;
			document.getElementById("exerciseUnitAdded" + title).innerText = exerciseUnit;
		};
	};

	function setExerciseItem(id) {
		if (id == "-1") {
			document.getElementById("exerciseDate").value = "不限制";
			document.getElementById("exerciseTime").value = "不限制";
			document.getElementById("exerciseName").value = "慢跑";
			document.getElementById("exerciseGroup").value = "1";
			document.getElementById("exerciseValue").value = "";
			document.getElementById("exerciseUnit").value = "米";

			document.getElementById("customExerciseDate").value = "";
			document.getElementById("customExerciseTime").value = "";
			document.getElementById("customExerciseName").value = "";
			document.getElementById("customExerciseUnit").value = "";

			document.getElementById("customExerciseDate").style.display = "none";
			document.getElementById("customExerciseTime").style.display = "none";
			document.getElementById("customExerciseName").style.display = "none";
			document.getElementById("customExerciseUnit").style.display = "none";

			document.getElementById("exercisePlanConfirmButton").innerText = "添加";
			document.getElementById("exercisePlanTitle").innerText = "添加";
		} else {
			var exerciseDate = document.getElementById("exerciseDateAdded" + id).innerText;
			var exerciseTime = document.getElementById("exerciseTimeAdded" + id).innerText;
			var exerciseName = document.getElementById("exerciseNameAdded" + id).innerText;
			var exerciseGroup = document.getElementById("exerciseGroupAdded" + id).innerText;
			var exerciseValue = document.getElementById("exerciseValueAdded" + id).innerText;
			var exerciseUnit = document.getElementById("exerciseUnitAdded" + id).innerText;

			if(exerciseDate == "" || exerciseDate == "工作日" || exerciseDate == "周末" || exerciseDate == "周一" || exerciseDate == "周二" ||
					exerciseDate == "周三" || exerciseDate == "周四" || exerciseDate == "周五" || exerciseDate == "周六" || exerciseDate == "周日") {
				document.getElementById("exerciseDate").value = exerciseDate == "" ? "不限制" : exerciseDate;
				document.getElementById("customExerciseDate").value = "";
				document.getElementById("customExerciseDate").style.display = "none";
			} else {
				document.getElementById("exerciseDate").value = "自定义";
				document.getElementById("customExerciseDate").value = exerciseDate;
				document.getElementById("customExerciseDate").style.display = "";
			}

			if(exerciseTime == "" || exerciseTime == "早晨" || exerciseTime == "上午" || exerciseTime == "中午" || exerciseTime == "下午" ||
					exerciseTime == "傍晚" || exerciseTime == "晚上") {
				document.getElementById("exerciseTime").value = exerciseTime == "" ? "不限制" : exerciseTime;
				document.getElementById("customExerciseTime").value = "";
				document.getElementById("customExerciseTime").style.display = "none";
			} else {
				document.getElementById("exerciseTime").value = "自定义";
				document.getElementById("customExerciseTime").value = exerciseTime;
				document.getElementById("customExerciseTime").style.display = "";
			}

			if(exerciseName == "慢跑" || exerciseName == "俯卧撑" || exerciseName == "深蹲" || exerciseName == "仰卧起坐") {
				document.getElementById("exerciseName").value = exerciseName;
				document.getElementById("customExerciseName").value = "";
				document.getElementById("customExerciseName").style.display = "none";
			} else {
				document.getElementById("exerciseName").value = "自定义";
				document.getElementById("customExerciseName").value = exerciseName;
				document.getElementById("customExerciseName").style.display = "";
			}

			if(exerciseUnit == "米" || exerciseUnit == "千米" || exerciseUnit == "个" || exerciseUnit == "分钟" || exerciseUnit == "小时") {
				document.getElementById("exerciseUnit").value = exerciseUnit;
				document.getElementById("customExerciseUnit").value = "";
				document.getElementById("customExerciseUnit").style.display = "none";
			} else {
				document.getElementById("exerciseUnit").value = "自定义";
				document.getElementById("customExerciseUnit").value = exerciseUnit;
				document.getElementById("customExerciseUnit").style.display = "";
			}

			document.getElementById("exerciseGroup").value = exerciseGroup;
			document.getElementById("exerciseValue").value = exerciseValue;
			document.getElementById("exercisePlanConfirmButton").innerText = "完成";
			document.getElementById("exercisePlanTitle").innerText = id;
		};
	};

	function oneDayRecipe() {
		var oneDaySubject = document.getElementById("oneDaySubject").value;
		var oneDayBreakfast = document.getElementById("oneDayBreakfast").value;
		var oneDayLunch = document.getElementById("oneDayLunch").value;
		var oneDayDinner = document.getElementById("oneDayDinner").value;

		var title = document.getElementById("oneDayRecipeTitle").innerText;
		if(title == "添加") {
			var planResult = document.getElementById("planResult");
			planResult.innerHTML +=
					"<div class='card card-local'>"
					+ "<div class='card-header'>"
					+ "一条一天的食谱"
					+ "<div class='card-actions'>"
					+ "<a class='btn-minimize collapsed' data-toggle='collapse' href='#collapseExample" + index + "' aria-expanded='true' aria-controls='collapseExample"+index+"'><i class='icon-arrow-up'></i></a>"
					+ "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#oneDayRecipe' id='" + index + "' onclick='setOneDayRecipeModal(this.id)'>修改</button>"
					+ "<a class='btn-close' href='#' id='removeButton:" + index + "' onclick='customRemove(this.id)'><i class='icon-close'></i></a>"
					+ "</div></div>"
					+ "<div class='card-block collapse' id='collapseExample"+index+"'>"
					+ "<br /><strong>主题： </strong> <span id='oneDaySubjectAdded" + index + "'>" + oneDaySubject + "</span>"
					+ "<br /><strong>早餐： </strong> <span id='oneDayBreakfastAdded" + index + "'>" + oneDayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='oneDayLunchAdded" + index + "'>" + oneDayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='oneDayDinnerAdded" + index + "'>" + oneDayDinner + "</span>"
					+"</div></div>";

			array[index] = "oneDayRecipe";
			index ++ ;
		} else {
			document.getElementById("oneDaySubjectAdded" + title).innerText = oneDaySubject;
			document.getElementById("oneDayBreakfastAdded" + title).innerText = oneDayBreakfast;
			document.getElementById("oneDayLunchAdded" + title).innerText = oneDayLunch;
			document.getElementById("oneDayDinnerAdded" + title).innerText = oneDayDinner;
		};
	};

	function setOneDayRecipeModal(id) {
		if(id == "-1") {
			document.getElementById("oneDaySubject").value = "";
			document.getElementById("oneDayBreakfast").value = "";
			document.getElementById("oneDayLunch").value = "";
			document.getElementById("oneDayDinner").value = "";
			document.getElementById("oneDayRecipeModalConfirm").innerText = "添加";
			document.getElementById("oneDayRecipeTitle").innerText = "添加";
		} else {
			var oneDaySubject = document.getElementById("oneDaySubjectAdded" + id).innerText;
			var oneDayBreakfast = document.getElementById("oneDayBreakfastAdded" + id).innerText;
			var oneDayLunch = document.getElementById("oneDayLunchAdded" + id).innerText;
			var oneDayDinner = document.getElementById("oneDayDinnerAdded" + id).innerText;

			document.getElementById("oneDaySubject").value = oneDaySubject;
			document.getElementById("oneDayBreakfast").value = oneDayBreakfast;
			document.getElementById("oneDayLunch").value = oneDayLunch;
			document.getElementById("oneDayDinner").value = oneDayDinner;
			document.getElementById("oneDayRecipeModalConfirm").innerText = "完成";
			document.getElementById("oneDayRecipeTitle").innerText = id;
		};
	};

	function oneWeekRecipe() {
		var oneWeekSubject = document.getElementById("oneWeekSubject").value;
		var mondayBreakfast = document.getElementById("mondayBreakfast").value;
		var mondayLunch = document.getElementById("mondayLunch").value;
		var mondayDinner = document.getElementById("mondayDinner").value;
		var tuesdayBreakfast = document.getElementById("tuesdayBreakfast").value;
		var tuesdayLunch = document.getElementById("tuesdayLunch").value;
		var tuesdayDinner = document.getElementById("tuesdayDinner").value;
		var wednesdayBreakfast = document.getElementById("wednesdayBreakfast").value;
		var wednesdayLunch = document.getElementById("wednesdayLunch").value;
		var wednesdayDinner = document.getElementById("wednesdayDinner").value;
		var thursdayBreakfast = document.getElementById("thursdayBreakfast").value;
		var thursdayLunch = document.getElementById("thursdayLunch").value;
		var thursdayDinner = document.getElementById("thursdayDinner").value;
		var fridayBreakfast = document.getElementById("fridayBreakfast").value;
		var fridayLunch = document.getElementById("fridayLunch").value;
		var fridayDinner = document.getElementById("fridayDinner").value;
		var saturdayBreakfast = document.getElementById("saturdayBreakfast").value;
		var saturdayLunch = document.getElementById("saturdayLunch").value;
		var saturdayDinner = document.getElementById("saturdayDinner").value;
		var sundayBreakfast = document.getElementById("sundayBreakfast").value;
		var sundayLunch = document.getElementById("sundayLunch").value;
		var sundayDinner = document.getElementById("sundayDinner").value;

		var title = document.getElementById("oneWeekRecipeTitle").innerText;
		if(title == "添加") {
			var planResult = document.getElementById("planResult");
			planResult.innerHTML +=
					"<div class='card card-local'>"
					+ "<div class='card-header'>"
					+ "一条一周的食谱"
					+ "<div class='card-actions'>"
					+ "<a class='btn-minimize collapsed' data-toggle='collapse' href='#collapseExample" + index + "' aria-expanded='true' aria-controls='collapseExample"+index+"'><i class='icon-arrow-up'></i></a>"
					+ "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#oneWeekRecipe' id='" + index + "' onclick='setOneWeekRecipeModal(this.id)'>修改</button>"
					+ "<a class='btn-close' href='#' id='removeButton:" + index + "' onclick='customRemove(this.id)'><i class='icon-close'></i></a>"
					+ "</div></div>"
					+ "<div class='card-block collapse' id='collapseExample"+index+"'>"
					+ "<br /><strong>主题： </strong> <span id='oneWeekSubjectAdded" + index + "'>" + oneWeekSubject + "</span>"
					+ "<br /><strong>周一： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='mondayBreakfastAdded" + index + "'>" + mondayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='mondayLunchAdded" + index + "'>" + mondayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='mondayDinnerAdded" + index + "'>" + mondayDinner + "</span>"
					+ "<br /><strong>周二： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='tuesdayBreakfastAdded" + index + "'>" + tuesdayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='tuesdayLunchAdded" + index + "'>" + tuesdayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='tuesdayDinnerAdded" + index + "'>" + tuesdayDinner + "</span>"
					+ "<br /><strong>周三： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='wednesdayBreakfastAdded" + index + "'>" + wednesdayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='wednesdayLunchAdded" + index + "'>" + wednesdayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='wednesdayDinnerAdded" + index + "'>" + wednesdayDinner + "</span>"
					+ "<br /><strong>周四： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='thursdayBreakfastAdded" + index + "'>" + thursdayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='thursdayLunchAdded" + index + "'>" + thursdayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='thursdayDinnerAdded" + index + "'>" + thursdayDinner + "</span>"
					+ "<br /><strong>周五： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='fridayBreakfastAdded" + index + "'>" + fridayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='fridayLunchAdded" + index + "'>" + fridayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='fridayDinnerAdded" + index + "'>" + fridayDinner + "</span>"
					+ "<br /><strong>周六： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='saturdayBreakfastAdded" + index + "'>" + saturdayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='saturdayLunchAdded" + index + "'>" + saturdayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='saturdayDinnerAdded" + index + "'>" + saturdayDinner + "</span>"
					+ "<br /><strong>周日： </strong>"
					+ "<br /><strong>早餐： </strong> <span id='sundayBreakfastAdded" + index + "'>" + sundayBreakfast + "</span>"
					+ "<br /><strong>午餐： </strong> <span id='sundayLunchAdded" + index + "'>" + sundayLunch + "</span>"
					+ "<br /><strong>晚餐： </strong> <span id='sundayDinnerAdded" + index + "'>" + sundayDinner + "</span>"
					+"</div></div>";

			array[index] = "oneWeekRecipe";
			index ++ ;
		} else {
			document.getElementById("oneWeekSubjectAdded" + title).innerText = oneWeekSubject;
			document.getElementById("mondayBreakfastAdded" + title).innerText = mondayBreakfast;
			document.getElementById("mondayLunchAdded" + title).innerText = mondayLunch;
			document.getElementById("mondayDinnerAdded" + title).innerText = mondayDinner;
			document.getElementById("tuesdayBreakfastAdded" + title).innerText = tuesdayBreakfast;
			document.getElementById("tuesdayLunchAdded" + title).innerText = tuesdayLunch;
			document.getElementById("tuesdayDinnerAdded" + title).innerText = tuesdayDinner;
			document.getElementById("wednesdayBreakfastAdded" + title).innerText = wednesdayBreakfast;
			document.getElementById("wednesdayLunchAdded" + title).innerText = wednesdayLunch;
			document.getElementById("wednesdayDinnerAdded" + title).innerText = wednesdayDinner;
			document.getElementById("thursdayBreakfastAdded" + title).innerText = thursdayBreakfast;
			document.getElementById("thursdayLunchAdded" + title).innerText = thursdayLunch;
			document.getElementById("thursdayDinnerAdded" + title).innerText = thursdayDinner;
			document.getElementById("fridayBreakfastAdded" + title).innerText = fridayBreakfast;
			document.getElementById("fridayLunchAdded" + title).innerText = fridayLunch;
			document.getElementById("fridayDinnerAdded" + title).innerText = fridayDinner;
			document.getElementById("saturdayBreakfastAdded" + title).innerText = saturdayBreakfast;
			document.getElementById("saturdayLunchAdded" + title).innerText = saturdayLunch;
			document.getElementById("saturdayDinnerAdded" + title).innerText = saturdayDinner;
			document.getElementById("sundayBreakfastAdded" + title).innerText = sundayBreakfast;
			document.getElementById("sundayLunchAdded" + title).innerText = sundayLunch;
			document.getElementById("sundayDinnerAdded" + title).innerText = sundayDinner;
		};
	};

	function setOneWeekRecipeModal(id) {
		if(id == "-1") {
			document.getElementById("oneWeekSubject").value = "";
			document.getElementById("mondayBreakfast").value = "";
			document.getElementById("mondayLunch").value = "";
			document.getElementById("mondayDinner").value = "";
			document.getElementById("tuesdayBreakfast").value = "";
			document.getElementById("tuesdayLunch").value = "";
			document.getElementById("tuesdayDinner").value = "";
			document.getElementById("wednesdayBreakfast").value = "";
			document.getElementById("wednesdayLunch").value = "";
			document.getElementById("wednesdayDinner").value = "";
			document.getElementById("thursdayBreakfast").value = "";
			document.getElementById("thursdayLunch").value = "";
			document.getElementById("thursdayDinner").value = "";
			document.getElementById("fridayBreakfast").value = "";
			document.getElementById("fridayLunch").value = "";
			document.getElementById("fridayDinner").value = "";
			document.getElementById("saturdayBreakfast").value = "";
			document.getElementById("saturdayLunch").value = "";
			document.getElementById("saturdayDinner").value = "";
			document.getElementById("sundayBreakfast").value = "";
			document.getElementById("sundayLunch").value = "";
			document.getElementById("sundayDinner").value = "";
			document.getElementById("oneWeekRecipeModalConfirm").innerText = "添加";
			document.getElementById("oneWeekRecipeTitle").innerText = "添加";
		} else {
			var oneWeekSubject = document.getElementById("oneWeekSubjectAdded" + id).innerText;
			var mondayBreakfast = document.getElementById("mondayBreakfastAdded" + id).innerText;
			var mondayLunch = document.getElementById("mondayLunchAdded" + id).innerText;
			var mondayDinner = document.getElementById("mondayDinnerAdded" + id).innerText;
			var tuesdayBreakfast = document.getElementById("tuesdayBreakfastAdded" + id).innerText;
			var tuesdayLunch = document.getElementById("tuesdayLunchAdded" + id).innerText;
			var tuesdayDinner = document.getElementById("tuesdayDinnerAdded" + id).innerText;
			var wednesdayBreakfast = document.getElementById("wednesdayBreakfastAdded" + id).innerText;
			var wednesdayLunch = document.getElementById("wednesdayLunchAdded" + id).innerText;
			var wednesdayDinner = document.getElementById("wednesdayDinnerAdded" + id).innerText;
			var thursdayBreakfast = document.getElementById("thursdayBreakfastAdded" + id).innerText;
			var thursdayLunch = document.getElementById("thursdayLunchAdded" + id).innerText;
			var thursdayDinner = document.getElementById("thursdayDinnerAdded" + id).innerText;
			var fridayBreakfast = document.getElementById("fridayBreakfastAdded" + id).innerText;
			var fridayLunch = document.getElementById("fridayLunchAdded" + id).innerText;
			var fridayDinner = document.getElementById("fridayDinnerAdded" + id).innerText;
			var saturdayBreakfast = document.getElementById("saturdayBreakfastAdded" + id).innerText;
			var saturdayLunch = document.getElementById("saturdayLunchAdded" + id).innerText;
			var saturdayDinner = document.getElementById("saturdayDinnerAdded" + id).innerText;
			var sundayBreakfast = document.getElementById("sundayBreakfastAdded" + id).innerText;
			var sundayLunch = document.getElementById("sundayLunchAdded" + id).innerText;
			var sundayDinner = document.getElementById("sundayDinnerAdded" + id).innerText;

			document.getElementById("oneWeekSubject").value = oneWeekSubject;
			document.getElementById("mondayBreakfast").value = mondayBreakfast;
			document.getElementById("mondayLunch").value = mondayLunch;
			document.getElementById("mondayDinner").value = mondayDinner;
			document.getElementById("tuesdayBreakfast").value = tuesdayBreakfast;
			document.getElementById("tuesdayLunch").value = tuesdayLunch;
			document.getElementById("tuesdayDinner").value = tuesdayDinner;
			document.getElementById("wednesdayBreakfast").value = wednesdayBreakfast;
			document.getElementById("wednesdayLunch").value = wednesdayLunch;
			document.getElementById("wednesdayDinner").value = wednesdayDinner;
			document.getElementById("thursdayBreakfast").value = thursdayBreakfast;
			document.getElementById("thursdayLunch").value = thursdayLunch;
			document.getElementById("thursdayDinner").value = thursdayDinner;
			document.getElementById("fridayBreakfast").value = fridayBreakfast;
			document.getElementById("fridayLunch").value = fridayLunch;
			document.getElementById("fridayDinner").value = fridayDinner;
			document.getElementById("saturdayBreakfast").value = saturdayBreakfast;
			document.getElementById("saturdayLunch").value = saturdayLunch;
			document.getElementById("saturdayDinner").value = saturdayDinner;
			document.getElementById("sundayBreakfast").value = sundayBreakfast;
			document.getElementById("sundayLunch").value = sundayLunch;
			document.getElementById("sundayDinner").value = sundayDinner;
			document.getElementById("oneWeekRecipeModalConfirm").innerText = "完成";
			document.getElementById("oneWeekRecipeTitle").innerText = id;
		};
	};

	function reply(id){
		if(id != "-1") {
			document.getElementById("question").innerText = id.split(";")[2];
			document.getElementById("infomation").innerHTML = id.split(";")[3];
			document.getElementById("userId").value = id.split(";")[0];
			document.getElementById("questionId").value = id.split(";")[1];
		}

		var reply = document.getElementById("reply");
		reply.style.display = reply.style.display == "" ? "none" : "";
		var myReply = document.getElementById("myReply");
		myReply.style.display = myReply.style.display == "" ? "none" : "";
		var list = document.getElementById("list");
		list.style.display = list.style.display == "" ? "none" : "";

		document.getElementById("planResult").innerHTML = "";
		document.getElementById("replyArea").value = "";
		index = 0;
		array = new Array();
	};
</script>

</body>


<script src="{{ URL::asset('/') }}js/libs/tether.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/pace.min.js"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ URL::asset('/') }}js/views/shared.js"></script>
<!-- GenesisUI main scripts -->
<script src="{{ URL::asset('/') }}js/app.js"></script>
<!-- Plugins and scripts required by this views -->
{{--
<script src="{{ URL::asset('/') }}js/libs/toastr.min.js"></script>
--}}
<script src="{{ URL::asset('/') }}js/libs/gauge.min.js"></script>
<script src="{{ URL::asset('/') }}js/libs/moment.min.js"></script>
<!-- Custom scripts required by this view -->
<script src="{{ URL::asset('/') }}js/views/main.js"></script>


</html>
