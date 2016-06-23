
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
					<li role="presentation" class="active"><a
						href="{{ URL::to('/admin') }}">权限管理</a></li>
					<li role="presentation"><a href="">发布活动</a></li>
					<li role="presentation"><a href="">活动管理</a></li>
				</ul>
			</div>
			<!-- sidebar -->

			<!-- main content -->
			
			
			
			
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">
				
				<form class="form-horizontal" method="POST" action="/admin/usermodify">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="inputID" class="col-sm-2 control-label">E-Mail</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
						<input name="email" type="text" class="form-control" readonly="readonly"
								id="inputEmails" placeholder="{{ $user->email }}"
								value="{{ $user->email }}">
						</div>
					</div>

					{{--new factor--}}
					<div class="form-group">
						<label for="inputNickname" class="col-sm-2 control-label">密码</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
							<input name="password" type="text" class="form-control"
								id="inputPassword" placeholder=""
								value="">
						</div>
					</div>

					<div class="form-group">
						<label for="inputNickname" class="col-sm-2 control-label">昵称</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
							<input name="nickname" type="text" class="form-control"
								id="inputNickname" placeholder="{{ $user->nickname }}"
								value="{{ $user->nickname }}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputTel" class="col-sm-2 control-label">电话</label>

						<div class="col-sm-8 col-md-6 col-lg-8">
							<input name="tel" type="text" class="form-control" id="inputTel"
								placeholder="{{ $user->tel }}" value="{{ $user->tel }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">性别</label>

						<div class="controls">
							<div class="col-sm-8 col-md-6 col-lg-8">
							
							@if($user->sex=='男')
							<!-- Inline Radios -->
								<label class="radio-inline"> <input type="radio" value="1"
									checked="checked" name="sex">男
								</label> <label class="radio-inline"> <input type="radio"
									value="2" name="sex"> 女
								</label>
							@else
							<!-- Inline Radios -->
								<label class="radio-inline"> <input type="radio" value="1"
									name="sex">男
								</label> <label class="radio-inline"> <input type="radio"
									checked="checked" value="2" name="sex"> 女
								</label>
							@endif
							
								
							</div>

						</div>
					</div>

					{{--new factor--}}

					<div class="form-group">
						<label class="col-sm-2 control-label">类型</label>

						<div class="controls">
							<div class="col-sm-8 col-md-6 col-lg-8">
							@if($user->type==1)
							<!-- Inline Radios -->
								<label class="radio-inline"> <input type="radio" value="1"
									checked="checked" name="type">普通用户
								</label> <label class="radio-inline"> <input type="radio"
									value="2" name="type"> 教练
								</label> <label class="radio-inline"> <input type="radio"
									value="3" name="type"> 医生
								</label>
							@elseif($user->type==2)
							<!-- Inline Radios -->
								<label class="radio-inline"> <input type="radio" value="1"
									name="type">普通用户
								</label> <label class="radio-inline"> <input type="radio"
									checked="checked" value="2" name="type"> 教练
								</label> <label class="radio-inline"> <input type="radio"
									value="3" name="type"> 医生
								</label>
							@else
							<!-- Inline Radios -->
								<label class="radio-inline"> <input type="radio" value="1"
									name="type">普通用户
								</label> <label class="radio-inline"> <input type="radio"
									value="2" name="type"> 教练
								</label> <label class="radio-inline"> <input type="radio"
									checked="checked" value="3" name="type"> 医生
								</label>
							@endif
								
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">提交</button>
							<a class="btn btn-default" href="{{ URL::to('/admin') }}"
								role="button">返回</a>
						</div>
					</div>
				</form>
				
				@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li> @endforeach
				</ul>
				@endif

				</div>
			</div>
			<!-- main content -->
		</div>
	</div>



</body>

</html>
