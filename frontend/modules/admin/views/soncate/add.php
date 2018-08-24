
<body>
<div class="x-body">
	<form class="layui-form">
		<div class="layui-form-item">
			<label for="username" class="layui-form-label">
				<span class="x-red">*</span>分类名称
			</label>
			<div class="layui-input-inline">
				<input type="text" id="title" name="title" required="" lay-verify="required"
				       autocomplete="off" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">所属分类</label>
			<div class="layui-input-block">
				<select name="cateid" lay-filter="aihao">
					<option value=""></option>
					<? foreach ($cates as $c): ?>
					<option value="<? echo $c->id ?>"><? echo $c->title ?></option>
					<? endforeach; ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label for="L_repass" class="layui-form-label">
			</label>
			<button  class="layui-btn" lay-filter="add" lay-submit="">
				增加
			</button>
		</div>
	</form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;

        //自定义验证规则
        form.verify({
            nikename: function(value){
                if(value.length < 5){
                    return '昵称至少得5个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
        });

        //监听提交
        form.on('submit(add)', function(data){
            //console.log(data);
            //发异步，把数据提交给php
            var data = data.field;
            //var code = $("#code").val();
            //console.log(name);
            var url = "<?php echo yii\helpers\Url::to(['soncate/add'])?>";
            $.ajax({
                url : url,
                async: false,
                type : "post",
                //data : {ids:JSON.stringify(ids)},
                data : data,
                dataType : "json",
                success : function(res) {
                    //alert(res);

                    //console.log(self);

                    if (res.status == 1) {

                        layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                            // 获得frame索引
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
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

            return false;
        });


    });
</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>