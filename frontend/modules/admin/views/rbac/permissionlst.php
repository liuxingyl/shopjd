<body>
<div class="x-body">
	<div class="layui-row">
		<form class="layui-form layui-col-md12 x-so">
			<input class="layui-input" placeholder="开始日" name="start" id="start">
			<input class="layui-input" placeholder="截止日" name="end" id="end">
			<input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
			<button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>

			<a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
				<i class="layui-icon" style="line-height:30px">ဂ</i></a>
		</form>
	</div>

	<xblock>
		<span class="x-right" style="line-height:40px">共有数据：<?php echo $count ?> 条</span>
	</xblock>
	<table class="layui-table">
		<thead>
		<tr>

			<th>权限名称</th>
			<th>描述</th>

			<th>操作</th>
		</thead>
		<tbody>
		<?php foreach ($roles as $r): ?>
			<tr>
				<td><?php echo $r->name ?></td>
                <td><?php echo $r->description ?></td>
				<td class="td-manage">
					<a title="编辑"  onclick="x_admin_show('编辑','<?php echo yii\helpers\Url::to(["rbac/editpremission",'name' => $r->name])?>')" href="javascript:;">
						<i class="layui-icon">&#xe642;</i>
					</a>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
    <div class="page">
		<?php echo \yii\widgets\LinkPager::widget([
			'pagination' => $pagination,

			'firstPageLabel'=>"首页",
			'nextPageLabel' => '下一页',
			'prevPageLabel' => '上一页',
			'lastPageLabel'=>'末页',
		]); ?>
    </div>

</div>
<script>

</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>