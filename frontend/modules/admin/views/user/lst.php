
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
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button disabled class="layui-btn" onclick="x_admin_show('添加用户','<?php echo yii\helpers\Url::to(["user/add"])?>')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $count ?> 条</span>
	</xblock>
	<table class="layui-table">
		<thead>
		<tr>
			<th>
				<div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
			</th>
			<th>ID</th>
			<th>用户名</th>
			<th>性别</th>
			<th>手机</th>
			<th>邮箱</th>
			<th>地址</th>
            <th>头像</th>
			<th>加入时间</th>
            <th>最后登录时间</th>
            <th>最后登录ip</th>
			<th>状态</th>
			<th>操作</th></tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
		<tr>
			<td>
				<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
			</td>
			<td><?php echo $user->id ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php if($user->profile->sex == 1): ?>
                    <?php echo "男"?>
                <?php elseif ($user->profile->sex == 2): ?>
					<?php echo "女"?>
				<?php else: ?>
					<?php echo "未知"?>
                <?php endif; ?>
            </td>
			<td><?php echo $user->phone ?></td>
			<td><?php echo $user->useremail ?></td>
            <td><?php echo $user->profile->address ?></td>
            <td>
                <img style="border-radius: 100%; width:30px; height:30px"  src="<?php echo $user->img ?>" >
            </td>
			<td><?php echo date('Y-m-d H:i:s',$user->create_time) ?></td>
            <td><?php echo date("Y-m-d H:i:s",$user->lastlogintime) ?></td>
            <td><?php echo long2ip($user->lastloginip) ?></td>
			<td class="td-status">
                <? if ($user->status == 1): ?>
				<span a = "<?php echo $user->id ?>" class="layui-btn layui-btn-normal layui-btn-mini jinyong">已启用</span>
				<? elseif ($user->status == 0): ?>
                <span a = "<?php echo $user->id ?>" class="layui-btn layui-btn-danger layui-btn-mini qiyong">已禁用</span>
                <? endif; ?>
            </td>
			<td class="td-manage">
				<a onclick="x_admin_show('用户信息','<?php echo yii\helpers\Url::to(["user/see"])?>')" href="javascript:;"  title="查看">
                    <i class="fa fa-eye"></i>
				</a>

				<a title="删除" onclick="member_del(this,'<?php echo $user->id ?>')" href="javascript:;">
					<i class="layui-icon">&#xe640;</i>
				</a>
			</td>
		</tr>
        <?php endforeach; ?>
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
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });

    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){

            if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

            }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
            }

        });
    }

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            var url = "<?php echo yii\helpers\Url::to(['user/del'])?>";
            $.ajax({
                url : url,
                async: false,
                type : "post",
                //data : {ids:JSON.stringify(ids)},
                data : {
                    id:id,
                },
                dataType : "json",
                success : function(res) {
                    //console.log(self);
                    if (res.status == 1) {
                        layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                            $(obj).parents("tr").remove();
                        });
                    } else if (res.status == 0) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                        //console.log(res.msg);
                        //layer.alert(res.msg, {icon: 2});
                        //layer.msg('添加失败!',{icon:1,time:1000});
                    } else if (res.status == 2) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                    } else if (res.status == 3) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                    } else {
                        layer.alert(res.msg, {icon: 2});
                    }
                }
            });
        });
    }



    function delAll (argument) {

        var data = tableCheck.getData();

        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
    }
</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>

<script>
    $(".jinyong").click(function(){
        var id = $(this).attr('a');
        var url = "<?php echo yii\helpers\Url::to(['user/jinyong']) ?>";
        console.log(id);
        $.ajax({
            url : url,
            async: false,
            type : "post",
            //data : {ids:JSON.stringify(ids)},
            data : {id:id},
            dataType : "json",
            success : function(res) {
                //alert(res.status);

                if (res.status ==1) {
                    layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                        location.reload();
                    });
                }else if(res.status ==0){
                    swal({title: res.msg, icon: "error"});
                    //console.log(res.msg);
                    //layer.alert(res.msg, {icon: 2});
                    //layer.msg('添加失败!',{icon:1,time:1000});
                }else if(res.status==2){
                    swal({title: res.msg, icon: "error"});
                }else if(res.status==3){
                    swal({title: res.msg, icon: "error"});
                }else{
                    layer.alert(res.msg, {icon: 2});
                }
            }

        });

    });
</script>

<script>
    $(".qiyong").click(function(){
        var id = $(this).attr('a');
        var url = "<?php echo yii\helpers\Url::to(['user/qiyong']) ?>";
        console.log(id);
        $.ajax({
            url : url,
            async: false,
            type : "post",
            //data : {ids:JSON.stringify(ids)},
            data : {id:id},
            dataType : "json",
            success : function(res) {
                //alert(res.status);

                if (res.status ==1) {
                    layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                        location.reload();
                    });
                }else if(res.status ==0){
                    swal({title: res.msg, icon: "error"});
                    //console.log(res.msg);
                    //layer.alert(res.msg, {icon: 2});
                    //layer.msg('添加失败!',{icon:1,time:1000});
                }else if(res.status==2){
                    swal({title: res.msg, icon: "error"});
                }else if(res.status==3){
                    swal({title: res.msg, icon: "error"});
                }else{
                    layer.alert(res.msg, {icon: 2});
                }
            }

        });

    });
</script>


</body>

</html>