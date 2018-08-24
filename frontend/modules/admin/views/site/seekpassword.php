<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>shopJD - 找回密码</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <link href="/adminassets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.staticfile.org/font-awesome/4.4.0/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/adminassets/css/style.min.css" rel="stylesheet">
    <link href="/adminassets/css/login.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/adminassets/lib/layui/css/layui.css" media="all">
    <link rel="stylesheet" type="text/css" href="/adminassets/css/login.css" media="all">
    <link rel="stylesheet" href="/adminassets/css/public.css" media="all" />
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/><![endif]-->
    <script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/adminassets/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/adminassets/lib/layui/layui.all.js"></script>
    <script type="text/javascript" src="/adminassets/js/xadmin.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location
        }
        ;
    </script>

</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7">
            <div class="signin-info">
                <div class="logopanel m-b">
                    <h1>SHOPJD</h1>
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用 <strong>shopjd找回密码</strong></h4>
                <ul class="m-b">
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势一</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势二</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势三</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势四</li>
                    <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i> 优势五</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-5">
            <h4 class="no-margins">shopjd找回密码：</h4>
            <p class="m-t-md">shopjd后台管理系统</p>
            <input id="name" name="name" type="text" class="form-control uname" placeholder="用户名"/>
            <input id="email" name="email" type="text" class="form-control email" placeholder="邮箱"/>
            <button id="submit" class="btn btn-success btn-block">找回</button>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; 2018 All Rights Reserved.
        </div>
    </div>
</div>
<script>
    //登录链接测试，使用时可删除
    $("#submit").click(function(){
        //var username = document.getElementById("username").value;
        var name = $("#name").val();
        var email = $("#email").val();
        //var code = $("#code").val();
        //console.log(name);
        var url = "<?php echo yii\helpers\Url::to(['site/seekpassword'])?>";
        $.ajax({
            url : url,
            async: false,
            type : "post",
            //data : {ids:JSON.stringify(ids)},
            data : {
                name:name,
                email:email,
                //code:code
            },
            dataType : "json",
            success : function(res) {
                //alert(res);

                //console.log(self);

                if (res.status == 1) {
                        swal({title: res.msg, icon: "warning", animation: "slide-from-top"});
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
</script>
</body>

</html>
