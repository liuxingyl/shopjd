<link href="/css/admin/style.css?v=4.1.0" rel="stylesheet">
<script src="/js/jquery.nestable.js"></script>
<body>

<div class="x-body">
    <div class="layui-row">
        <form method="post" action="<?php echo yii\helpers\Url::to(['category/lst'])?>" class="layui-form layui-col-md12 x-so">
            <input class="layui-input" placeholder="开始日" name="start" id="start">
            <input class="layui-input" placeholder="截止日" name="end" id="end">
            <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>

            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
                <i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </form>
    </div>

    <xblock>
        <span class="x-right" style="line-height:40px">共有数据：条</span>
    </xblock>

            <div class="dd" id="nestable2">
                <ol class="dd-list">

                </ol>
            </div>





    <style>
        #nestable .dd-list .dd-item >.dd-demo::before{width: 20px;height: 30px;line-height: 30px;top: -0px;color: orange;
        }
        #nestable .dd-list .dd-item >.dd-demo1::before{width: 20px;height: 30px;line-height: 30px;top: -0px;color: red;}
        a.dd-demo{position: absolute;top: 6px;right: 60px;}
        a.dd-demo1{position: absolute;top: 8px;right: 20px;}
    </style>







    <div style="margin-left: 50px" class="layui-col-sm10">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>分类列表</h5>
                        <div style="float: right" id="nestable-menu">
                            <button class="layui-btn" data-action="expand-all">展开所有</button>
                            <button class="layui-btn" data-action="collapse-all">收起所有</button>
                            <button class="layui-btn" onclick="x_admin_show('添加分类','<?php echo yii\helpers\Url::to(["category/add"])?>')"><i class="layui-icon"></i>添加分类</button>
<!--                            <button id="order" class="layui-btn">保存排序</button>-->
                        </div>

            </div>
            <div class="ibox-content">
                <div class="dd" id="nestable">
                    <ol class="dd-list">
	                    <?php foreach ($data1 as $data): ?>
                        <li class="dd-item" data-id="<?php echo $data['id'] ?>">
                            <div class="dd-handle"><?php echo $data['title'] ?>
                            </div>

                            <a onclick="x_admin_show('编辑','<?php echo yii\helpers\Url::to(["category/edit","id" => $data['id']])?>')" class="dd-demo">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a  onclick="cate_del(this,'<?php echo $data['id'] ?>')" class="dd-demo1">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                            <ol class="dd-list">
	                            <?php foreach ($soncates as $s): ?>
                                <?php if ($s['cateid'] == $data['id']): ?>
                                <li class="dd-item" data-id="<?php echo $s['id'] ?>">
                                    <div class="dd-handle"><?php echo $s['title'] ?></div>
                                    <a onclick="x_admin_show('编辑','<?php echo yii\helpers\Url::to(["soncate/edit","id" => $s['id']])?>')" class="dd-demo">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a onclick="soncate_del(this,'<?php echo $s['id'] ?>')" class="dd-demo1 sondel">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </li>
                                <?php endif; ?>
	                            <?php endforeach;?>
                            </ol>
                        </li>
	                    <?php endforeach;?>
                    </ol>
                </div>

                <input type="hidden" id="nestable-output" class="form-control"></input>

            </div>
        </div>
    </div>
    </div>
</div>
<script>
    $('#order').on('click',function () {
        var data = $('#nestable-output').val();
        var url = "<?php echo yii\helpers\Url::to(['category/order'])?>";
        //console.log(data);
        $.ajax({
            url : url,
            async: false,
            type : "post",
            //data : {order:JSON.stringify(data)},
            data :{order:data} ,
            dataType : "json",
            success : function(res) {
                //alert(res);
                if (res.status == 1) {

                    layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                        location.reload();
                    });
                } else if (res.status == 0) {
                    layer.alert(res.msg, {icon: 2});
                } else {
                    layer.alert(res.msg, {icon: 2});
                }
            }
        });
    });
</script>
<script>
    function cate_del(obj,id){
        layer.confirm('确认要删除吗？该操作会删除其下面的所有子分类以及所有商品！！！请谨慎！！！',function(index){
            var url = "<?php echo yii\helpers\Url::to(['category/del'])?>";
            $.ajax({
                url : url,
                async: false,
                type : "post",
                //data : {ids:JSON.stringify(ids)},
                data : {id:id},
                dataType : "json",
                success : function(res) {
                    //alert(res);

                    //console.log(self);

                    if (res.status == 1) {

                        layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                            $(obj).parent("li").remove();
                        });
                    } else if (res.status == 0) {
                        layer.alert(res.msg, {icon: 2});
                    } else if (res.status == 2) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                    } else if (res.status == 3) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                    } else {
                        layer.alert(res.msg, {icon: 2});
                    }
                }
            });
        })


    }

    function soncate_del(obj,id){
        layer.confirm('确认要删除吗？该操作会删除其下面的所有商品！！！请谨慎！！！',function(index){
            var url = "<?php echo yii\helpers\Url::to(['soncate/del'])?>";
            $.ajax({
                url : url,
                async: false,
                type : "post",
                //data : {ids:JSON.stringify(ids)},
                data : {id:id},
                dataType : "json",
                success : function(res) {
                    //alert(res);

                    if (res.status == 1) {

                        layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                            $(obj).parent("li").remove();
                        });
                    } else if (res.status == 0) {
                        layer.alert(res.msg, {icon: 2});
                    } else if (res.status == 2) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                    } else if (res.status == 3) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
                    } else {
                        layer.alert(res.msg, {icon: 2});
                    }
                }
            });
        })


    }
</script>
<script>
    $(document).ready(function () {

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('浏览器不支持');
            }
        };
        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1
        }).on('change', updateOutput);

        // activate Nestable for list 2
        $('#nestable2').nestable({
            group: 1
        }).on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        updateOutput($('#nestable2').data('output', $('#nestable2-output')));

        $('#nestable-menu').on('click', function (e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });
    });
</script>

</body>

</html>