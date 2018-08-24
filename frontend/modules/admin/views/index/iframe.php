<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<title>后台</title>
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="shortcut icon" href="favicon.ico">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.staticfile.org/font-awesome/4.4.0/css/font-awesome.css?v=4.4.0" rel="stylesheet">

	<!-- Morris -->
	<link href="/adminassets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

	<!-- Gritter -->
	<link href="/adminassets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

	<link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="/adminassets/css/style.min-v=4.1.0.css" rel="stylesheet">

</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-sm-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">月</span>
					<h5>收入</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins"><? echo number_format($totalprice,2) ?></h1>
					<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i>
					</div>
					<small>总收入</small>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right">全年</span>
					<h5>订单</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">275,800</h1>
					<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i>
					</div>
					<small>新订单</small>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-primary pull-right">今天</span>
					<h5>访客</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">106,120</h1>
					<div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i>
					</div>
					<small>新访客</small>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-danger pull-right">最近一个月</span>
					<h5>活跃用户</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">80,600</h1>
					<div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
					</div>
					<small>12月</small>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>订单</h5>
					<div class="pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-xs btn-white active">天</button>
							<button type="button" class="btn btn-xs btn-white">月</button>
							<button type="button" class="btn btn-xs btn-white">年</button>
						</div>
					</div>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-9">
							<div class="flot-chart">
								<div class="flot-chart-content" id="flot-dashboard-chart"></div>
							</div>
						</div>
						<div class="col-sm-3">
							<ul class="stat-list">
								<li>
									<h2 class="no-margins">2,346</h2>
									<small>订单总数</small>
									<div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i>
									</div>
									<div class="progress progress-mini">
										<div style="width: 48%;" class="progress-bar"></div>
									</div>
								</li>
								<li>
									<h2 class="no-margins ">4,422</h2>
									<small>最近一个月订单</small>
									<div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
									</div>
									<div class="progress progress-mini">
										<div style="width: 60%;" class="progress-bar"></div>
									</div>
								</li>
								<li>
									<h2 class="no-margins ">9,180</h2>
									<small>最近一个月销售额</small>
									<div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i>
									</div>
									<div class="progress progress-mini">
										<div style="width: 22%;" class="progress-bar"></div>
									</div>
								</li>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>消息</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						<a class="close-link">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content ibox-heading">
					<h3><i class="fa fa-envelope-o"></i> 新消息</h3>
					<small><i class="fa fa-tim"></i> 您有22条未读消息</small>
				</div>
				<div class="ibox-content">
					<div class="feed-activity-list">

						<div class="feed-element">
							<div>
								<small class="pull-right text-navy">1月前</small>
								<strong>井幽幽</strong>
								<div>
									有人说：“一辈子很长，要跟一个有趣的人在一起”。我想关注我的人，应该是那种喜欢找乐子也乐意分享乐趣的人，你们一定挺优秀的。所以单身的应该在这条留言，互相勾搭一下。特别有钱人又帅可以直接私信我！
								</div>
								<small class="text-muted">4月11日 00:00</small>
							</div>
						</div>

						<div class="feed-element">
							<div>
								<small class="pull-right">2月前</small>
								<strong>马伯庸 </strong>
								<div>又方便，又防水，手感又好，还可以用手机遥控。简直是拍戏利器，由其是跟老师们搭戏的时候…想想还有点小激动啊，嘿嘿。</div>
								<small class="text-muted">11月8日 20:08</small>
							</div>
						</div>

						<div class="feed-element">
							<div>
								<small class="pull-right">5月前</small>
								<strong>芒果宓 </strong>
								<div>一个完整的梦。</div>
								<small class="text-muted">11月8日 20:08</small>
							</div>
						</div>

						<div class="feed-element">
							<div>
								<small class="pull-right">5月前</small>
								<strong>刺猬尼克索</strong>
								<div>哈哈哈哈 你卖什么萌啊! 蠢死了</div>
								<small class="text-muted">11月8日 20:08</small>
							</div>
						</div>


						<div class="feed-element">
							<div>
								<small class="pull-right">5月前</small>
								<strong>老刀99</strong>
								<div>昨天评论里你见过最“温暖和感人”的诗句，整理其中经典100首，值得你收下学习。</div>
								<small class="text-muted">11月8日 20:08</small>
							</div>
						</div>
						<div class="feed-element">
							<div>
								<small class="pull-right">5月前</small>
								<strong>娱乐小主 </strong>
								<div>你是否想过记录自己的梦？你是否想过有自己的一个记梦本？小时候写日记，没得写了就写昨晚的梦，后来变成了习惯………翻了一晚上自己做过的梦，想哭，想笑…</div>
								<small class="text-muted">11月8日 20:08</small>
							</div>
						</div>
						<div class="feed-element">
							<div>
								<small class="pull-right">5月前</small>
								<strong>DMG电影 </strong>
								<div>《和外国男票乘地铁，被中国大妈骂不要脸》妹子实在委屈到不行，中国妹子找外国男友很令人不能接受吗？大家都来说说自己的看法</div>
								<small class="text-muted">11月8日 20:08</small>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-8">

			<div class="row">
				<div class="col-sm-6">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>用户项目列表</h5>
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
								<a class="close-link">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							<table class="table table-hover no-margins">
								<thead>
								<tr>
									<th>状态</th>
									<th>日期</th>
									<th>用户</th>
									<th>值</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										<small>进行中...</small>
									</td>
									<td><i class="fa fa-clock-o"></i> 11:20</td>
									<td>青衣5858</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 24%</td>
								</tr>
								<tr>
									<td><span class="label label-warning">已取消</span>
									</td>
									<td><i class="fa fa-clock-o"></i> 10:40</td>
									<td>徐子崴</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 66%</td>
								</tr>
								<tr>
									<td>
										<small>进行中...</small>
									</td>
									<td><i class="fa fa-clock-o"></i> 01:30</td>
									<td>姜岚昕</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 54%</td>
								</tr>
								<tr>
									<td>
										<small>进行中...</small>
									</td>
									<td><i class="fa fa-clock-o"></i> 02:20</td>
									<td>武汉大兵哥</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 12%</td>
								</tr>
								<tr>
									<td>
										<small>进行中...</small>
									</td>
									<td><i class="fa fa-clock-o"></i> 09:40</td>
									<td>荆莹儿</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 22%</td>
								</tr>
								<tr>
									<td><span class="label label-primary">已完成</span>
									</td>
									<td><i class="fa fa-clock-o"></i> 04:10</td>
									<td>栾某某</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 66%</td>
								</tr>
								<tr>
									<td>
										<small>进行中...</small>
									</td>
									<td><i class="fa fa-clock-o"></i> 12:08</td>
									<td>范范范二妮</td>
									<td class="text-navy"><i class="fa fa-level-up"></i> 23%</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>任务列表</h5>
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
								<a class="close-link">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							<ul class="todo-list m-t small-list ui-sortable">
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-check-square"></i></a>
									<span class="m-l-xs todo-completed">开会</span>

								</li>
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-check-square"></i></a>
									<span class="m-l-xs  todo-completed">项目开发</span>

								</li>
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i></a>
									<span class="m-l-xs">修改bug</span>
									<small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
								</li>
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i></a>
									<span class="m-l-xs">修改bug</span>
									<small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
								</li>
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i></a>
									<span class="m-l-xs">修改bug</span>
									<small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
								</li>
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i></a>
									<span class="m-l-xs">修改bug</span>
									<small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
								</li>
								<li>
									<a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i></a>
									<span class="m-l-xs">修改bug</span>
									<small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/adminassets/js/plugins/flot/jquery.flot.js"></script>
<script src="/dminassets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/dminassets/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="/adminassets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/adminassets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/adminassets/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="/adminassets/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/adminassets/js/demo/peity-demo.min.js"></script>
<script src="/adminassets/js/content.min-v=1.0.0.js"></script>
<script src="/adminassets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/adminassets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/adminassets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/adminassets/js/plugins/easypiechart/jquery.easypiechart.js"></script>
<script src="/adminassets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="/adminassets/js/demo/sparkline-demo.min.js"></script>
<script>
    $(document).ready(function () {

        var myDate = new Date();
        var year = myDate.getFullYear();
        var month = myDate.getMonth() + 1;
        //alert(month);
        $(".chart").easyPieChart({barColor: "#f8ac59", scaleLength: 5, lineWidth: 4, size: 80});
        $(".chart2").easyPieChart({barColor: "#1c84c6", scaleLength: 5, lineWidth: 4, size: 80});
        var data2 = [[gd(year, month, 1), 7], [gd(year, month, 2), 6], [gd(year, month, 3), 4], [gd(year,month , 4), 8], [gd(year,month , 5), 9], [gd(year, month, 6), 7], [gd(year, month, 7), 5], [gd(year, month, 8), 4], [gd(year, month, 9), 7], [gd(year, month, 10), 8], [gd(year, month, 11), 9], [gd(year, month, 12), 6], [gd(year, month, 13), 4], [gd(year, month, 14), 5], [gd(year, month, 15), 11], [gd(year, month, 16), 8], [gd(year, month, 17), 8], [gd(year, month, 18), 11], [gd(year, month, 19), 11], [gd(year, month, 20), 6], [gd(year, month, 21), 6], [gd(year, month, 22), 8], [gd(year, month, 23), 11], [gd(year, month, 24), 13], [gd(year, month, 25), 7], [gd(year, month, 26), 9], [gd(year, month, 27), 9], [gd(year, month, 28), 8], [gd(year, month, 29), 5], [gd(year, month, 30), 8], [gd(year, month, 31), 25]];
        var data3 = [[gd(year, month, 1), 800], [gd(year, month, 2), 500], [gd(year, month, 3), 600], [gd(year, month, 4), 700], [gd(year, month, 5), 500], [gd(year, month, 6), 456], [gd(year, month, 7), 800], [gd(year, month, 8), 589], [gd(year, month, 9), 467], [gd(year, month, 10), 876], [gd(year, month, 11), 689], [gd(year, month, 12), 700], [gd(year, month, 13), 500], [gd(year, month, 14), 600], [gd(year, month, 15), 700], [gd(year, month, 16), 786], [gd(year, month, 17), 345], [gd(year, month, 18), 888], [gd(year, month, 19), 888], [gd(year, month, 20), 888], [gd(year, month, 21), 987], [gd(year, month, 22), 444], [gd(year, month, 23), 999], [gd(year, month, 24), 567], [gd(year, month, 25), 786], [gd(year, month, 26), 666], [gd(year, month, 27), 888], [gd(year, month, 28), 900], [gd(year, month, 29), 178], [gd(year, month, 30), 555], [gd(year, month, 31), 993]];
        var dataset = [{
            label: "订单数",
            data: data3,
            color: "#1ab394",
            bars: {show: true, align: "center", barWidth: 24 * 60 * 60 * 600, lineWidth: 0}
        }, {
            label: "付款数",
            data: data2,
            yaxis: 2,
            color: "#464f88",
            lines: {lineWidth: 1, show: true, fill: true, fillColor: {colors: [{opacity: 0.2}, {opacity: 0.2}]}},
            splines: {show: false, tension: 0.6, lineWidth: 1, fill: 0.1},
        }];
        var options = {
            xaxis: {
                mode: "time",
                tickSize: [3, "day"],
                tickLength: 0,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: "Arial",
                axisLabelPadding: 10,
                color: "#838383"
            },
            yaxes: [{
                position: "left",
                max: 1070,
                color: "#838383",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: "Arial",
                axisLabelPadding: 3
            }, {
                position: "right",
                clolor: "#838383",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: " Arial",
                axisLabelPadding: 67
            }],
            legend: {noColumns: 1, labelBoxBorderColor: "#000000", position: "nw"},
            grid: {hoverable: false, borderWidth: 0, color: "#838383"}
        };

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime()
        }

        var previousPoint = null, previousLabel = null;
        $.plot($("#flot-dashboard-chart"), dataset, options);
        var mapData = {
            "US": 298,
            "SA": 200,
            "DE": 220,
            "FR": 540,
            "CN": 120,
            "AU": 760,
            "BR": 550,
            "IN": 200,
            "GB": 120,
        };
        $("#world-map").vectorMap({
            map: "world_mill_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: "#e4e4e4",
                    "fill-opacity": 0.9,
                    stroke: "none",
                    "stroke-width": 0,
                    "stroke-opacity": 0
                }
            },
            series: {regions: [{values: mapData, scale: ["#1ab394", "#22d6b1"], normalizeFunction: "polynomial"}]},
        })
    });
</script>

</body>

</html>
