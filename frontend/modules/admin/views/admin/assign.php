<link href="/css/admin/style.css?v=4.1.0" rel="stylesheet">
<script src="/js/jquery.nestable.js"></script>
<body>
<div class="x-body">

		<div class="layui-form-item">
			<label for="name" class="layui-form-label">
			            管理员
			</label>
			<div class="layui-input-inline">
				<input disabled type="text" value="<? echo $admin->name ?>" required="" autocomplete="off" class="layui-input">
			</div>
		</div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">
                分配角色
            </label>
            <table  class="layui-table layui-input-inline">
                <tbody>
                <tr>
                    <td>
                        <div id="juese1" class="layui-input-block">
							<? foreach ($roles as $k => $p): ?>
                                <div class="layui-unselect layui-form-checkbox <? foreach ($children['roles'] as $c): ?><? if ($c == $k): ?>layui-form-checked<? endif; ?> <? endforeach; ?>" lay-skin="primary" type="checkbox" title="<? echo $k ?>" data-id="<?php echo $k ?>"><i class="layui-icon">&#xe605;</i></div><? echo $k ?>
							<? endforeach; ?>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

		<div class="layui-form-item layui-form-text">
			<label class="layui-form-label">
				分配权限
			</label>

            <div class="ibox-content">
                <div class="dd" id="nestable">
                    <ol class="dd-list">
						<?php foreach ($permissions2 as $k => $p): ?>
                            <li class="dd-item" data-id="">
                                <div class="dd-handle"><?php echo $p[0] ?>
                                </div>


                                <div class="layui-unselect layui-form-checkbox <? foreach ($children as $c): ?><? foreach ($c as $c1): ?><? if ($k == $c1): ?>layui-form-checked <? endif; ?> <? endforeach; ?><? endforeach; ?>" lay-skin="primary" data-id=<?php echo $k ?>><i class="layui-icon">&#xe605;</i></div>

                                <ol class="dd-list">
									<?php unset($p[0]) ?>
									<?php foreach ($p as $k1 => $v): ?>
                                        <li class="dd-item" data-id="">
                                            <div class="dd-handle"><?php echo $v ?></div>

                                            <div class="layui-unselect layui-form-checkbox <? foreach ($children as $c): ?><? foreach ($c as $c1): ?><? if ($k1 == $c1): ?>layui-form-checked <? endif; ?> <? endforeach; ?><? endforeach; ?>" lay-skin="primary" data-id=<?php echo $k1 ?>><i class="layui-icon">&#xe605;</i></div>

                                        </li>
									<?php endforeach;?>

                                </ol>
                            </li>
						<?php endforeach;?>
                    </ol>
                </div>

                <input type="hidden" id="nestable-output" class="form-control"></input>

            </div>


		</div>
		<div class="layui-form-item">
            <button class="layui-btn layui-btn" onclick="addAll()">提交</button>
		</div>

</div>
<script>
    function addAll (argument) {

        var data = tableCheck.getData();
        console.log(data);
        var url = "<?php echo yii\helpers\Url::to(['admin/assign'])?>";
        var url = url + "?adminid=<?php echo $admin->id ?>";
        $.ajax({
            url : url,
            async: false,
            type : "post",
            data : {datas:JSON.stringify(data)},
            //data : data,
            dataType : "json",

            success : function(res) {
                if (res.status == 1) {

                    layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);
                    });
                } else if (res.status == 0) {
                    layer.alert(res.msg, {icon: 2});
                } else {
                    layer.alert(res.msg, {icon: 2});
                }
            },
            fail : function (res) {
                console.log("失败"+res);
            }
        });

    }
</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>