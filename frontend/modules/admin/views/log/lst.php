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
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $count ?> 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>app名称</th>
            <th>请求URL</th>
            <th>错误内容</th>
            <th>UA</th>
            <th>IP</th>
            <th>时间</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($logs as $l): ?>
        <tr>
            <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $l->id ?></td>
            <td><?php echo $l->app_name ?></td>
            <td><?php echo $l->URL ?></td>
            <td><?php echo $l->content ?></td>
            <td><?php echo $l->ua ?></td>
            <td><?php echo $l->ip ?></td>
            <td><?php echo date("Y-m-d H:i:s",$l->create_time) ?></td>
            <td class="td-manage">
              
                
                <a title="删除" onclick="member_del(this,'<?php echo $l->id ?>')" href="javascript:;">
                    <i class="layui-icon">&#xe640;</i>
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
            //console.log(name);
            var url = "<?php echo yii\helpers\Url::to(['admin/del'])?>";
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
</body>

</html>