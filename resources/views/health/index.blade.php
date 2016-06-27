
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
					<li class="active"><a href="{{ URL::to('/health') }}">健康</a></li>
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
			<div class="sidebar col-xs-2 col-sm-3 col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="active"><a
						href="{{ URL::to('/health') }}">身体管理</a></li>
					<li role="presentation"><a href="{{ URL::to('/health/sleep') }}">睡眠分析</a></li>
					<li role="presentation"><a href="{{ URL::to('/health/rate') }}">心率分析</a></li>
					<!-- <li role="presentation"><a
						href="{{ URL::to('/health/suggestion') }}">健康建议</a></li> -->
				</ul>
			</div>
			<!-- main content -->
			<div
				class="col-xs-9 col-sm-7 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="panel panel-default panel-success"style="height: 330px">
							<!-- Default panel contents -->
							<div class="panel-heading">
								<b>当前情况</b>
							</div>
							<div class="panel-body">
								<p>当前身高：<?php echo $height ?>cm</p>
								<p>当前体重：<?php echo $weight ?>kg</p>
								<p>目标身高：<?php echo $goalheight ?>cm</p>
								<p>目标体重：<?php echo $goalweight ?>kg</p>

							</div>
						</div>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="panel panel-default panel-success"style="height: 330px">
							<!-- Default panel contents -->
							<div class="panel-heading">
								<b>当前BMI</b>
							</div>
							<div class="panel-body">
							<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
							<div id="bmi" style="height: 300px"></div>
							<!-- ECharts单文件引入 -->
							<script src="{{ URL::asset('/') }}build/dist/echarts.js"></script>
							<script type="text/javascript">
        // 路径配置
        require.config({
            paths: {
                echarts: '/build/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/gauge'
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('bmi'), 'macarons'); 
                
                var option = {
                	    tooltip : {
                	        formatter: "{a} <br/>{b} : {c}%"
                	    },
                	    toolbox: {
                	        show : false,
                	        feature : {
                	            mark : {show: true},
                	            restore : {show: true},
                	            saveAsImage : {show: true}
                	        }
                	    },
                	    series : [
                	        {
                	            name:'个性化仪表盘',
                	            type:'gauge',
                	            center : ['50%', '50%'],    // 默认全局居中
                	            radius : [0, '75%'],
                	            startAngle: 140,
                	            endAngle : -140,
                	            min: 10,                     // 最小值
                	            max: 40,                   // 最大值
                	            precision: 2,               // 小数精度，默认为0，无小数点
                	            splitNumber: 30,             // 分割段数，默认为5
                	            axisLine: {            // 坐标轴线
                	                show: true,        // 默认显示，属性show控制显示与否
                	                lineStyle: {       // 属性lineStyle控制线条样式
                	                    color: [[0.28, 'skyblue'],[0.46, 'lightgreen'],[0.6, 'orange'],[1, '#ff4500']], 
                	                    width: 30
                	                }
                	            },
                	            axisTick: {            // 坐标轴小标记
                	                show: true,        // 属性show控制显示与否，默认不显示
                	                interval:0,
                	                splitNumber: 2,    // 每份split细分多少段
                	                length :8,         // 属性length控制线长
                	                lineStyle: {       // 属性lineStyle控制线条样式
                	                    color: '#eee',
                	                    width: 1,
                	                    type: 'solid'
                	                }
                	            },
                	            axisLabel: {           // 坐标轴文本标签，详见axis.axisLabel
                	                show: true,
                	                interval:0,
                	                formatter: function(v){
                	                    switch (v+''){
                	                        case '13': return '偏轻';
                	                        case '21': return '健康';
                	                        case '26': return '超重';
                	                        case '32': return '肥胖';
                	                        default: return '';
                	                    }
                	                },
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: '#333'
                	                }
                	            },
                	            splitLine: {           // 分隔线
                	                show: true,        // 默认显示，属性show控制显示与否
                	                length :30,         // 属性length控制线长
                	                lineStyle: {       // 属性lineStyle（详见lineStyle）控制线条样式
                	                    color: '#eee',
                	                    width: 2,
                	                    type: 'solid'
                	                }
                	            },
                	            pointer : {
                	                length : '70%',
                	                width : 8,
                	                color : 'auto'
                	            },
                	            title : {
                	                show : true,
                	                offsetCenter: ['-65%', -10],       // x, y，单位px
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: '#333',
                	                    fontSize : 15
                	                }
                	            },
                	            detail : {
                	                show : true,
                	                backgroundColor: 'rgba(0,0,0,0)',
                	                borderWidth: 0,
                	                borderColor: '#ccc',
                	                width: 100,
                	                height: 40,
                	                offsetCenter: ['-60%', 10],       // x, y，单位px
                	                formatter:'{value}',
                	                textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                	                    color: 'auto',
                	                    fontSize : 30
                	                }
                	            },
                	            data:[{value: <?php echo $bmi ?>, name: 'BMI'}]
                	        }
                	    ]
                	};
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>
							
							
							
								
								

							</div>
						</div>
					</div>
				</div>




				<div class="panel panel-default panel-success">
					<!-- Default panel contents -->
					<div class="panel-heading">
						<b>体重变化</b>
					</div>
					<div class="panel-body">



						<div id="weightchange" style="height: 400px"></div>
						<script src="/build/dist/echarts-all.js"></script>
						<script type="text/javascript">
                    // 基于准备好的dom，初始化echarts图表
                    var myChart = echarts.init(document.getElementById('weightchange'));

                    var option = {

                        tooltip : {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['体重']
                        },
                        toolbox: {
                            show : true,
                            feature : {
                                mark : {show: true},
                                dataView : {show: true, readOnly: false},
                                restore : {show: true},
                                saveAsImage : {show: true}
                            }
                        },
                        calculable : true,
                        xAxis : [
                            {
                                type : 'category',
                                boundaryGap : false,
                                data : <?php echo json_encode($dates)?>
                                }
                        ],
                        yAxis : [
                            {
                                type : 'value',
                                axisLabel : {
                                    formatter: '{value} kg'
                                },

                            }
                        ],
                        series : [
                            {
                                name:'体重',
                                type:'line',
                                data:<?php echo json_encode($weights) ?>,
                                markPoint : {
                                    data : [
                                        {type : 'max', name: '最大值'},
                                        {type : 'min', name: '最小值'}
                                    ]
                                },

                            },
                        ]
                    };
                    // 为echarts对象加载数据
                    myChart.setOption(option);

                </script>






					</div>
				</div>


				<div class="panel panel-default panel-success">
					<!-- Default panel contents -->
					<div class="panel-heading">
						<b>目标设置</b> <a href="javascript:form.submit();" type="button"
							class="btn btn-default btn-xs btn-success pull-right"> <span
							class="glyphicon glyphicon-star" aria-hidden="true"></span> 保存
						</a>
					</div>

					<div class="panel-body">
						<form name="form" class="form-horizontal" method="POST"
							action="/health">

							{!! csrf_field() !!}
							<div class="form-group">
								<label for="inputHeight" class="col-sm-2 control-label">身高</label>

								<div class="col-sm-8 col-md-6 col-lg-8">
									<div class="input-group">
										<input name="height" type="text" class="form-control"
											id="inputHeight" placeholder="请输入目标身高"
											aria-label="Amount (to the nearest dollar)"><span
											class="input-group-addon">cm</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputWeight" class="col-sm-2 control-label">体重</label>

								<div class="col-sm-8 col-md-6 col-lg-8">
									<div class="input-group">
										<input name="weight" type="text" class="form-control"
											id="inputWeight" placeholder="请输入目标体重"
											aria-label="Amount (to the nearest dollar)"> <span
											class="input-group-addon">kg</span>
									</div>

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

			</div>
		</div>
	</div>




</body>

</html>
