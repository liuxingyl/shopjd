
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

                <div class="billing-address">
                    <h2 class="border h1">默认收货地址</h2>
                    <form>
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>姓名*</label>
                                <input id="name" class="le-input" value="<? echo $address->name ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>手机号*</label>
                                <input id="phone" class="le-input" value="<? echo $address->phone ?>" >
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>地址*</label>
                                <input id="address" class="le-input" data-placeholder="" value="<? echo $address->address ?>">
                            </div>

                        </div><!-- /.field-row -->

<!--                        <div class="row field-row">-->
<!--                            <div id="create-account" class="col-xs-12">-->
<!--                                <input  class="le-checkbox big" type="checkbox"  />-->
<!--                                <a class="simple-link bold" href="#">设为默认地址?</a> - you will receive email with temporary generated password after login you need to change it.-->
<!--                            </div>-->
<!--                        </div><!-- /.field-row -->

                    </form>
                </div><!-- /.billing-address -->


                <section id="shipping-address">
                    <h2 class="border h1">更换收货地址？</h2>
                    <form>
                        <div class="row field-row">
                            <div class="col-xs-12">

                                <a class="simple-link bold" href="#">点击更换收货地址</a>
                            </div>
                        </div><!-- /.field-row -->
                    </form>
                </section><!-- /#shipping-address -->


                <section id="your-order">
                    <h2 class="border h1">商品一览</h2>
                    <form>
                        <? foreach ($carts as $cart): ?>
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <a href="#" class="qty pr" num="<? echo $cart->productnum ?>"><? echo $cart->productnum ?> x</a>
                            </div>

                            <div class="col-xs-12 col-sm-9 ">
                                <div class="title ti" productid="<? echo $cart->product->id ?>"><a href="#"><? echo $cart->product->title ?></a></div>
                                <div class="brand">sony</div>
                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">￥ <? echo number_format($cart->productnum*$cart->price,2) ?></div>
                            </div>
                        </div><!-- /.order-item -->
                        <? endforeach; ?>
                    </form>
                </section><!-- /#your-order -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                        <div id="subtotal-holder">
                            <ul class="tabled-data inverse-bold no-border">
                                <li>
                                    <label>购物车总计</label>
                                    <div class="value ">￥ <? echo number_format($totalprice,2); ?></div>
                                </li>
                                <li>
                                    <label>运费</label>
                                    <div class="value">
                                        <div class="radio-group">
                                            <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold">免运费</div><br>
<!--                                            <input class="le-radio" type="radio" name="group1" value="local" checked>  <div class="radio-label">local delivery<br><span class="bold">$15</span></div>-->
                                        </div>
                                    </div>
                                </li>
                            </ul><!-- /.tabled-data -->

                            <ul id="total-field" class="tabled-data inverse-bold ">
                                <li>
                                    <label>总价格</label>
                                    <div class="value">￥ <? echo number_format($totalprice,2); ?></div>
                                </li>
                            </ul><!-- /.tabled-data -->

                        </div><!-- /#subtotal-holder -->
                    </div><!-- /.col -->
                </div><!-- /#total-area -->

                <div id="payment-method-options">
                    <form>
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="Direct">
                            <div class="radio-label bold ">请选择支付方式<br>
                                <p>   </p>
                            </div>
                        </div><!-- /.payment-method-option -->

                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="cheque">
                            <img width="40px" height="40px" src="/assets/images/zfb.jpg">
                            <div class="radio-label bold ">支付宝</div>
                        </div><!-- /.payment-method-option -->

                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="group2" value="paypal">
                            <img width="40px" height="40px" src="/assets/images/wxzf.jpg">
                            <div class="radio-label bold">微信</div>
                        </div><!-- /.payment-method-option -->
                    </form>
                </div><!-- /#payment-method-options -->

                <div class="place-order-button">
                    <button class="le-button big" to="<? echo $totalprice; ?>">提交订单</button>
                </div><!-- /.place-order-button -->

            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    <!-- ========================================= CONTENT : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
  </html>

        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <script src="/js/layer/layer.js"></script>

        <?php
$ordercreate = yii\helpers\Url::to(['order/create']);
$orderlst = yii\helpers\Url::to(['order/lst']);
$js = <<<JS

$(".big").on('click',function(){

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
    
    // layer.open({
    //     title: '订单详情',
    //     content: '<span>姓名:   </span>'+name+'<br /><span>手机:   </span>'+phone+'<br /><span>收货地址：    </span>'+address+'<br /><span></span><br />'
    //     ,btn: ['确认', '取消']
    //     ,yes: function(index, layero){
    //     //按钮【按钮一】的回调
    //     }
    //     ,btn2: function(index, layero){
    //         //按钮【按钮二】的回调
    //
    //     //return false 开启该代码可禁止点击该按钮关闭
    //     }
    //     ,cancel: function(){ 
    //     //右上角关闭回调
    //
    //     //return false 开启该代码可禁止点击该按钮关闭
    //     }
    // });
    var url = "$ordercreate";
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