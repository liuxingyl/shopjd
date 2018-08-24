
<script type="text/javascript" src="/adminassets/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/adminassets/ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="/adminassets/ueditor/lang/zh-cn/zh-cn.js"></script>
<body>
<div class="x-body">
	<form class="layui-form">
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>权限名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="title" disabled name="name" value="<? echo $name ?>" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
		<div class="layui-form-item">
			<label for="username" class="layui-form-label">
				<span class="x-red">*</span>权限描述
			</label>
			<div class="layui-input-block">
				<input type="text" id="title" name="description" value="<? echo $description ?>" required="" lay-verify="required" autocomplete="off" class="layui-input">
			</div>
		</div>

		<div class="layui-form-item">
			<label for="L_repass" class="layui-form-label">
			</label>
			<button  class="layui-btn" lay-filter="add" lay-submit="">
				确认
			</button>
		</div>
	</form>
</div>

<script>
    layui.use('upload', function(){
        var upload = layui.upload;
        //console.log("xxx");
        //执行实例
        var uploadInst = upload.render({
            elem: '#img' //绑定元素
            ,ext: 'jpg|png|gif'
            ,accept:'images' //上传文件类型
            ,url: '<?php echo yii\helpers\Url::to(['upload/uploadimg'])?>' //上传接口
            ,data: {
                preurl: function(){
                    return $('#img1').attr('src');
                }
            }
            // ,before: function(obj){
            //     loading = layer.load(2, {
            //     shade: [0.2,'#000']
            //     });
            // }
            ,done: function(res){
                //layer.close(loading);
                //上传完毕回调
                var url = 'http://' + res.url;
                console.log(url);
                $('#img1').attr('src',url);
                $('#img2').attr('value',url);
                 layer.msg('上传成功', {icon: 1, time: 1000}, function () {
                        });
            }
            ,error: function(){
                //请求异常回调

            }
        });
    });

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
            //发异步，把数据提交给php
            var data = data.field;
            //var code = $("#code").val();
            console.log(data);
            var url = "<?php echo yii\helpers\Url::to(['rbac/editpremission'])?>";
            $.ajax({
                url : url,
                async: false,
                type : "post",
                //data : {ids:JSON.stringify(ids)},
                data : data,
                dataType : "json",
                success : function(res) {
                        console.log(res);
                    if (res.status == 1) {

                        layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                            // 获得frame索引
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                            location.reload();
                        });
                    } else if (res.status == 0) {
                        layer.alert(res.msg, {
                            icon: 2,
                            skin: 'layui-layer-molv' //样式类名
                        });
                        //console.log(res.msg);
                        //layer.alert(res.msg, {icon: 2});
                        //layer.msg('添加失败!',{icon:1,time:1000});
                    } else if (res.status == 2) {
                        layer.alert(res.msg, {
                            icon: 2,
                            skin: 'layui-layer-molv' //样式类名
                        });
                    } else if (res.status == 3) {
                        layer.alert(res.msg, {
                            icon: 2,
                            skin: 'layui-layer-molv' //样式类名
                        });
                    } else {
                        layer.alert(res.msg, {icon: 2});
                    }
                }
            });

            return false;
        });


    });
</script>
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        initialFrameWidth : '80%',//宽度
        initialFrameHeight: 500//高度
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