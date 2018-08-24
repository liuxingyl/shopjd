
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">信息修改</h2>
                        <form id='postForm' enctype="multipart/form-data" action="http://shopjd.com/index.php?r=member/edit" method="post" >
                        <div class="login-form cf-style-1">
                            <div class="field-row">
                                <label>用户名</label>
                                <input id="username" type="text" value="<? echo \Yii::$app->user->identity->username ?>" class="le-input">
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>密码</label>
                                <input id="password" type="password" value="" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>确认密码</label>
                                <input id="repass" type="password" value="" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>邮箱</label>
                                <input id="useremail" type="text" value="<? echo \Yii::$app->user->identity->useremail ?>" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>电话</label>
                                <input id="phone" type="text" value="<? echo \Yii::$app->user->identity->phone ?>" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">

                                <label>头像</label>
                                <input id="img" name="UploadForm[img]" type="file" class="le-input">

                                <img src="<? echo \Yii::$app->user->identity->img ?>">
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button type="submit" id="edit" class="le-button huge">确认修改</button>
                            </div><!-- /.buttons-holder -->
                        </div><!-- /.cf-style-1 -->
                        </form>
                    </section><!-- /.sign-in -->
                </div><!-- /.col -->



            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
 
<?php
$memberedit = yii\helpers\Url::to(['member/edit']);
$memberlogin = yii\helpers\Url::to(['member/login']);
$js = <<<JS
$("#edit").click(function(){
    var username = $("#username").val()
    var password = $("#password").val()
    var repass = $("#repass").val()
    var phone = $("#phone").val()
    var useremail = $("#useremail").val()
    var img = $("#img").val();
    console.log(new FormData($('#postForm')[0]));
    var url = "$memberedit";
    $.ajax({
        url : url,
        async: false,
        enctype: 'multipart/form-data',
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : new FormData($('#postForm')[0]),
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
    var useremail = $("#useremail").val();
    var password = $("#password").val();
    //var checkbox = $("#checkbox").val();
    // console.log(useremail);
    // console.log(password);
    // console.log(checkbox);
    var url = "$memberlogin";
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            useremail:useremail,
            password:password,
        },
        dataType : "json",
        success : function(res) {
            //alert(res);

            if (res.status ==1) {
                swal({title: res.msg, icon: "success",});
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

JS;
$this->registerJs($js);