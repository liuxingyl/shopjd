
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">登录</h2>
                        <p>第三方登录</p>

                        <div class="social-auth-buttons">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-qq"></i> QQ 登录</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-weibo"></i> 微博登录</button>
                                </div>
                            </div>
                        </div>

                        <div class="login-form cf-style-1">
                            <div class="field-row">
                                <label>用户名</label>
                                <input id="username" type="text" class="le-input">
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>密码</label>
                                <input id="password" type="password" class="le-input">
                            </div><!-- /.field-row -->

                            <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color"><input id="checkbox" type="checkbox" class="le-checbox auto-width inline"> <span class="bold">记住密码</span></label>
                        	</span>
                                <span class="pull-right">
                        		<a href="#" class="content-color bold">忘记密码 ?</a>
                        	</span>
                            </div>

                            <div class="buttons-holder">
                                <button id="login" class="le-button huge">登录</button>
                            </div><!-- /.buttons-holder -->
                        </div><!-- /.cf-style-1 -->

                    </section><!-- /.sign-in -->
                </div><!-- /.col -->

                <div class="col-md-6">
                    <section class="section register inner-left-xs">
                        <h2 class="bordered">注册</h2>
                        <p></p>

                        <div class="register-form cf-style-1">
                            <div class="field-row">
                                <label>邮箱</label>
                                <input id="email" type="text" class="le-input">
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button id="sign" class="le-button huge">注册</button>
                            </div><!-- /.buttons-holder -->
                        </div>

                        <h2 class="semi-bold">注册成功后 您将享受以下服务 :</h2>

                        <ul class="list-unstyled list-benefits">
                            <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                            <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                            <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                        </ul>

                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->

<?php
$membercreate = yii\helpers\Url::to(['member/create']);
$memberlogin = yii\helpers\Url::to(['member/login']);
$indexindex = yii\helpers\Url::to(['index/index']);
$js = <<<JS
    $("#sign").click(function(){
    var email = $("#email").val();
    console.log(email);
    var url = "$membercreate";
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            useremail:email,
        },
        dataType : "json",
        success : function(res) {
            //alert(res);

            if (res.status ==1) {
                swal({title: res.msg, icon: "success"});
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

$("#login").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    //var checkbox = $("#checkbox").val();
     console.log(username);
     console.log(password);
    // console.log(checkbox);
    var url = "$memberlogin";
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            username:username,
            password:password,
        },
        dataType : "json",
        success : function(res) {
            //alert(res);

            if (res.status ==1) {
                swal({
                    title: res.msg,
                    icon: 'success',
                    text:'         ',
                    timer: 1000,
                    button: false
                })
                    .then(() => {
                        location.href="$indexindex"
                    });
            }else if(res.status ==0){
                swal({title: res.msg, icon: "error"});
                //console.log(res.msg);
                //layer.alert(res.msg, {icon: 2});
                //layer.msg('添加失败!',{icon:1,time:1000});
            }else if(res.status==2){
                swal({title: res.msg, icon: "error"});
            }else if(res.status==3){
                swal({title: "res.msg", 
                icon: "error"});
            }else{
                layer.alert(res.msg, {icon: 2});
            }
        }

    });

});
JS;
$this->registerJs($js);