
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
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item current">
                                <a href="#">Checkout Process</a>
                            </li>
                        </ul><!-- /.breadcrumb-nav-holder -->
                    </div>
                </div><!-- /.container -->
            </div>
            <!-- ========================================= BREADCRUMB : END ========================================= --></div>
    </header>
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= CONTENT ========================================= -->

    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">

                <section id="your-order">
                    <h2 class="border h1">订单列表</h2>
                    <form>
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <div class="title ti">订单编号</div>

                            </div>

                            <div class="col-xs-12 col-sm-1 no-margin">
                                <div class="title ti">订单状态</div>
                            </div>
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <div class="title ti">订单详情</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">操作</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">订单总价</div>
                            </div>
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">下单时间</div>
                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price"></div>
                            </div>
                        </div><!-- /.order-item -->
                        <? foreach ($orders as $o): ?>
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <div class="title" productid=""><a href="#">...<? echo substr($o->orderID,-14) ?></a></div>

                            </div>

                            <div class="col-xs-12 col-sm-1 no-margin">
                                <? if ($o->status == -1): ?>
                                <div class="title ti" productid="">待付款<a href="#"></a></div>
	                            <? elseif ($o->status == 0): ?>
                                    <div class="title ti" productid="">待发货<a href="#"></a></div>
	                            <? elseif ($o->status == 1): ?>
                                    <div class="title ti" productid="">已发货<a href="#"></a></div>
                                <? endif; ?>

                            </div>

                            <div class="col-xs-12 col-sm-1 no-margin">
                                <? foreach ($o->orderDetail as $d): ?>
	                            <? foreach ($orderDetails as $e): ?>
                                    <? if ($e->orderid == $o->id && $e->product->id == $d->productid): ?>
                                <div class="title ti"><? echo mb_substr($e->product->title,0,6) ?>... X <? echo $d->productnum ?></div>
                                <? endif; ?>
                                <? endforeach; ?>
                                <? endforeach; ?>
                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">

	                            <? if ($o->status == -1): ?>
                                    <button class="le-button minus" >取消订单</button>
                                    <button class="le-button minus" >付款</button>
	                            <? elseif ($o->status == 0): ?>
                                    <button class="le-button minus" >取消订单</button>
                                    <button class="le-button minus" >提醒发货</button>
	                            <? elseif ($o->status == 1): ?>
                                    <button class="le-button minus" >退货</button>
                                    <button class="le-button minus" >确认收货</button>
	                            <? endif; ?>

                            </div>
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">￥ <? echo number_format($o->totalprice,2) ?></div>
                            </div>
                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price"><? echo date('Y-m-d H:i:s',$o->create_time) ?></div>
                            </div>
                        </div><!-- /.order-item -->
                        <? endforeach; ?>
                    </form>
                </section><!-- /#your-order -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                    </div><!-- /.col -->
                </div><!-- /#total-area -->

            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    <!-- ========================================= CONTENT : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
  </html>

<?php
$orderlst = yii\helpers\Url::to(['order/lst']);
$js = <<<JS
$(".le-button").on('click',function(){
    var title1 = $(".ti");
    var num1 = $(".pr");
    var name = $("#name").attr('value');
    var phone = $("#phone").attr('value');
    var address = $("#address").attr('value');
    var totalprice = $(this).attr('to');
    var num = [];
    var title = [];
    var productid = [];
    var number = [];
    Object.keys(title1).forEach(function(key){
        if (title1[key].innerText != undefined) {
            title.push(title1[key].attributes.productid)
        }

    });
    Object.keys(title).forEach(function(key){
        productid.push(title[key].value)

    });
    Object.keys(num1).forEach(function(key){
        if (num1[key].attributes != undefined) {
            num.push(num1[key].attributes.num)
        }
    });
    Object.keys(num).forEach(function(key){
            number.push(num[key].value)

    });
    console.log(productid);
    productid = JSON.stringify(productid);
    num = JSON.stringify(number);
    var url = "$orderlst";
    $.ajax({
        url : url,
        async: false,
        type : "post",
        traditional: true,
        //title : {title:JSON.stringify(title)},
        //num : {num:JSON.stringify(num)},
        data : {
            productid:productid,
            num:num,
            name:name,
            phone:phone,
            address:address,
            totalprice:totalprice,
        },
        dataType : "json",
        success : function(res) {
            //console.log(res);

            if (res.status == 1) {
                location.href="$orderlst"
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