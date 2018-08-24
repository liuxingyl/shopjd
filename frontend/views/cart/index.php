<!-- /.megamenu-vertical -->
        <!-- ========================================= NAVIGATION : END ========================================= -->
        <div class="animate-dropdown"><!-- ========================================= BREADCRUMB ========================================= -->
            <div id="breadcrumb-alt">
                <div class="container">
                    <div class="breadcrumb-nav-holder minimal">
                        <ul>
                            <li class="dropdown breadcrumb-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    shop by department
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                    <li><a href="#">CPUs, Processors</a></li>
                                    <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                    <li><a href="#">Graphics, Video Cards</a></li>
                                    <li><a href="#">Interface, Add-On Cards</a></li>
                                    <li><a href="#">Laptop Replacement Parts</a></li>
                                    <li><a href="#">Memory (RAM)</a></li>
                                    <li><a href="#">Motherboards</a></li>
                                    <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                    <li><a href="#">Motherboard Components</a></li>
                                </ul>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">首页</a>
                            </li>
                            <li class="breadcrumb-item current">
                                <a href="#">购物车</a>
                            </li>
                        </ul>
                    </div><!-- .breadcrumb-nav-holder -->
                </div><!-- /.container -->
            </div><!-- /#breadcrumb-alt -->
            <!-- ========================================= BREADCRUMB : END ========================================= --></div>
    </header>
    <!-- ============================================================= HEADER : END ============================================================= -->		<section id="cart-page">
        <div class="container">
            <!-- ========================================= CONTENT ========================================= -->
            <div class="col-xs-12 col-md-9 items-holder no-margin">
                <? foreach ($carts as $c): ?>
                <div class="row no-margin cart-item">
                    <div class="col-xs-12 col-sm-2 no-margin">
                        <a href="#" class="thumb-holder">
                            <img class="lazy" alt="" src="<? echo $c->product->cover ?>" />
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-5 ">
                        <div class="title">
                            <a href="#"><? echo $c->product->title ?></a>
                        </div>
                        <div class="brand">sony</div>
                    </div>

                    <div class="col-xs-12 col-sm-3 no-margin">
                        <div class="quantity">
                            <div class="le-quantity">
                                <form>
                                    <a class="minus" pi="<? echo $c->product->id ?>" n="<? echo $c->productnum - 1 ?>" href="#reduce"></a>
                                    <input name="quantity" readonly="readonly" type="text" value="<? echo $c->productnum ?>" />
                                    <a class="plus" pi="<? echo $c->product->id ?>" n="<? echo $c->productnum + 1 ?>" href="#add"></a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 no-margin">
                        <div class="price">
                            ￥<? echo number_format($c->price*$c->productnum,2); ?>
                        </div>
                        <a style="cursor:pointer" class="close-btn" id="<? echo $c->id; ?>" ></a>
                    </div>
                </div><!-- /.cart-item -->
                <? endforeach; ?>

            </div>
            <!-- ========================================= CONTENT : END ========================================= -->

            <!-- ========================================= SIDEBAR ========================================= -->

            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border">购物车</h1>
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <label>购物车总价</label>
                                <div class="value pull-right">￥<? echo number_format($totalprice,2); ?></div>
                            </li>
                            <li>
                                <label>运费</label>
                                <div class="value pull-right">免运费</div>
                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label>订单总价</label>
                                <div class="value pull-right">￥<? echo  number_format($totalprice,2) ?></div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <a class="le-button big" href="<? echo \yii\helpers\Url::to(['order/check']) ?>" >结算</a>
                            <a class="simple-link block" href="<? echo yii\helpers\Url::to(['index/index']) ?>" >继续选购</a>
                        </div>
                    </div>
                </div><!-- /.widget -->

                <div id="cupon-widget" class="widget">
                    <h1 class="border">使用优惠券</h1>
                    <div class="body">
                        <form>
                            <div class="inline-input">
                                <input data-placeholder="搜索优惠券" type="text" />
                                <button class="le-button" type="submit">使用</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.widget -->
            </div><!-- /.sidebar -->

            <!-- ========================================= SIDEBAR : END ========================================= -->
        </div>
    </section>		<!-- ============================================================= FOOTER ============================================================= -->

<?php
$cartindex = yii\helpers\Url::to(['cart/index']);
$cartdel = yii\helpers\Url::to(['cart/del']);
$js = <<<JS
$(".plus").on('click',function(){
    var num = $(this).attr('n');
    var productid = $(this).attr('pi');
    //var checkbox = $("#checkbox").val();
    //console.log(productid);
    var url = "$cartindex";
    $.ajax({
        url : url,
        async: false,
        type : "post",
        data : {
            num:num,
            productid:productid,
        },
        dataType : "json",
        success : function(res) {
            //alert(res);

            if (res.status == 1) {
                location.reload();
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

$(".minus").on('click',function(){
    var num = $(this).attr('n');
    var productid = $(this).attr('pi');
    //var checkbox = $("#checkbox").val();
    //console.log(productid);
    console.log(num);
    console.log(productid);
    var url = "$cartindex";
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            num:num,
            productid:productid,
        },
        dataType : "json",
        success : function(res) {
            //alert(res);

            if (res.status == 1) {
                location.reload();
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


$(".close-btn").on('click',function(){

    swal({
        title: "你确要删除吗?",
        //text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: ["返回", "确定"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var id = $(this).attr('id');
                var url = "$cartdel";
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
                        //alert(res);

                        if (res.status == 1) {
                            location.reload();
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
            }
        });

});

JS;
$this->registerJs($js);