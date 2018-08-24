
<script type="text/javascript" src="/adminassets/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/adminassets/ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="/adminassets/ueditor/lang/zh-cn/zh-cn.js"></script>
<body>
<div class="x-body">
	<form class="layui-form">
        <input type="hidden" name="id" value="<? echo $product->id ?>">
		<div class="layui-form-item">
			<label for="username" class="layui-form-label">
				<span class="x-red">*</span>名称
			</label>
			<div class="layui-input-block">
				<input type="text" id="title" name="title" value="<? echo $product->title ?>" required="" lay-verify="required" autocomplete="off" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">所属分类</label>
			<div class="layui-input-inline">
                <select name="cateid" xm-select="cate" xm-select-radio="" xm-select-search="" xm-select-search-type="dl">
					<option value=""></option>
					<? foreach ($cates as $cate): ?>
						<option <? if ($cate['id'] == $product->cateid): ?>selected<? endif; ?> value="<? echo $cate['id'] ?>"><? echo $cate['title'] ?></option>
					<? endforeach; ?>
				</select>
			</div>
            <label class="layui-form-label">所属品牌</label>
            <div class="layui-input-inline">
                <select name="brandid" id="brand" lay-filter="">
                    <option value=""></option>
					<? foreach ($brands as $b): ?>
                        <option <? if ($product->brandid == $b->id): ?>selected<? endif; ?> value="<? echo $b->id ?>"><? echo $b->title ?></option>
					<? endforeach; ?>
                </select>
            </div>
		</div>
        <div class="layui-form-item">
            <label class="layui-form-label">所属推荐位</label>
            <div class="layui-input-inline">
                <select name="featuredid" lay-filter="">
                    <option value=""></option>
					<? foreach ($featureds as $f): ?>
                        <option <? if ($f['id'] == $product->featuredid): ?>selected<? endif; ?> value="<? echo $f['id'] ?>"><? echo $f['title'] ?></option>
					<? endforeach; ?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>封面
            </label>
            <div  class="layui-input-inline">
                <button type="button" class="layui-btn" id="img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>

            </div>
            <img id="img1" name="img" src = '<? echo $product->cover ?>' >
            <input type="hidden" id="img2" name="cover" value="">
        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>商品简介
            </label>
            <div class="layui-input-block">
            <textarea name="abstract" type="text/plain">
                <? echo $product->abstract ?>
            </textarea>
            </div>

        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>库存
            </label>
            <div class="layui-input-inline">
                <input type="text" id="title" value="<? echo $product->num ?>" name="num" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>价格
            </label>
            <div class="layui-input-inline">
                <input type="text" id="title" value="<? echo $product->price ?>" name="price" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>本店价格
            </label>
            <div class="layui-input-inline">
                <input type="text" id="title" value="<? echo $product->saleprice ?>" name="saleprice" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">在售</label>
            <div class="layui-input-block">
                <input value="1" type="checkbox" name="issale" lay-skin="switch" lay-text="ON|OFF" <? if ($product->issale == 1): ?> checked <? endif; ?>>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">热门</label>
            <div class="layui-input-block">
                <input value="1" type="checkbox" name="ishot" lay-skin="switch" lay-text="ON|OFF" <? if ($product->ishot == 1): ?> checked <? endif; ?> >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新品</label>
            <div class="layui-input-block">
                <input value="1" type="checkbox" name="isnew" lay-skin="switch" lay-text="ON|OFF" <? if ($product->isnew == 1): ?> checked <? endif; ?> >
            </div>
        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>商品介绍
            </label>
            <div class="layui-input-block">
            <textarea id="container" name="description" type="text/plain">
                        <? echo $product->description ?>
            </textarea>
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
    layui.config({
        base: '/adminassets/js/'
    }).extend({
        formSelects: 'formSelects-v4'
    }).use(['form', 'formSelects'], function() {
        var form = layui.form, formSelects = layui.formSelects;

        // formSelects.value('cate');			//获取选中的值
        // formSelects.value('cate', 'val');		//获取选中的val数组
        // formSelects.value('cate', 'name');		//获取选中的name数组
        //formSelects.value('cate', [1, 3]);	//动态赋值

        formSelects.on('cate', function(id, vals, val, isAdd, isDisabled){
            //id:           点击select的id
            //vals:         当前select已选中的值
            //val:          当前select点击的值
            //isAdd:        当前操作选中or取消
            //isDisabled:   当前选项是否是disabled

            console.log(val);
            console.log(isAdd);

            var url = "<?php echo yii\helpers\Url::to(['product/add'])?>";


            var postData = {id:val,isAdd:isAdd};
            //alert(data.value); //得到被选中的值
            $.post(url,postData,function(res) {

                if (res.status == 1) {
                    //console.log(res.data);
                    var brand_html = '';
                    brand_html += "<option></option>";
                    $.each(res.data,function(k,v) {

                        brand_html += "<option value='" + v.id +"'>"+v.title+"</option>";
                    });
                    //console.log(city_html);
                    $('#brand').html(brand_html);
                    form.render();
                }else{

                }

            },'json');

            //如果return false, 那么将取消本次操作
            //  return false;
        });
    });
</script>
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
        //监听提交
        form.on('submit(add)', function(data){
            console.log(data);
            //发异步，把数据提交给php
            var data = data.field;
            //var code = $("#code").val();
            //console.log(name);
            var url = "<?php echo yii\helpers\Url::to(['product/edit'])?>";
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