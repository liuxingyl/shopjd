
        <!-- ========================================= NAVIGATION : END ========================================= -->
        <div class="animate-dropdown"><!-- ========================================= BREADCRUMB ========================================= -->
            <!-- ========================================= BREADCRUMB : END ========================================= --></div>
    </header>
    <!-- ============================================================= HEADER : END ============================================================= -->		<div id="single-product">
        <div class="container">

            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">

                    <div id="owl-single-product">
                        <div class="single-product-gallery-item" id="slide1">
                            <a data-rel="prettyphoto" href="<? echo $product->cover ?>">
                                <img class="img-responsive" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->

                        <div class="single-product-gallery-item" id="slide2">
                            <a data-rel="prettyphoto" href="<? echo $product->cover ?>">
                                <img class="img-responsive" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->

                        <div class="single-product-gallery-item" id="slide3">
                            <a data-rel="prettyphoto" href="<? echo $product->cover ?>">
                                <img class="img-responsive" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->
                    </div><!-- /.single-product-slider -->


                    <div class="single-product-gallery-thumbs gallery-thumbs">

                        <div id="owl-single-product-thumbnails">
                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="#slide1">
                                <img width="67" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>

                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide2">
                                <img width="67" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>

                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide3">
                                <img width="67" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>

                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="0" href="#slide1">
                                <img width="67" alt="" src="<? echo $product->cover ?>" data-echo="<? echo $product->cover ?>" />
                            </a>


                        </div><!-- /#owl-single-product-thumbnails -->

                        <div class="nav-holder left hidden-xs">
                            <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                        </div><!-- /.nav-holder -->

                        <div class="nav-holder right hidden-xs">
                            <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                        </div><!-- /.nav-holder -->

                    </div><!-- /.gallery-thumbs -->

                </div><!-- /.single-product-gallery -->
            </div><!-- /.gallery-holder -->
            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">



                    <div class="title"><a href="#"><? echo $product->title ?></a></div>
                    <div class="brand">sony</div>

                    <div class="social-row">
                        <span class="st_facebook_hcount"></span>
                        <span class="st_twitter_hcount"></span>
                        <span class="st_pinterest_hcount"></span>
                    </div>

                    <div class="buttons-holder">
                        <a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                    </div>

                    <div class="excerpt">
                        <p><? echo $product->abstract ?></p>
                    </div>

                    <div class="prices">
                        <div class="price-current">￥<? echo $product->saleprice ?></div>
                        <div class="price-prev">￥<? echo $product->price ?></div>
                        <div class="availability"><label>库存:</label><span class="available">225</span></div>
                    </div>

                    <div class="qnt-holder">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input id="num" name="quantity" readonly="readonly" type="text" value="1" />
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>
                        <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $product->id ?>" style="cursor:pointer" id="cart" class="le-button huge">添加到购物车</a>
                    </div><!-- /.qnt-holder -->
                </div><!-- /.body -->

            </div><!-- /.body-holder -->
        </div><!-- /.container -->
    </div><!-- /.single-product -->

    <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder">

                <ul class="nav nav-tabs simple" >
                    <li class="active"><a href="#description" data-toggle="tab">商品介绍</a></li>
                    <li><a href="#additional-info" data-toggle="tab">规格包装</a></li>
                    <li><a href="#reviews" data-toggle="tab">商品评价 (3)</a></li>
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">
                    <div class="tab-pane active" id="description">
	                    <? echo $product->description ?>
                        <div class="meta-row">
                            <div class="inline">
                                <label>SKU:</label>
                                <span>54687621</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>categories:</label>
                                <span><a href="#">-50% sale</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">desktop PC</a></span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>tag:</label>
                                <span><a href="#">fast</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">strong</a></span>
                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #description -->

                    <div class="tab-pane" id="additional-info">
                        <ul class="tabled-data">
                            <li>
                                <label>weight</label>
                                <div class="value">7.25 kg</div>
                            </li>
                            <li>
                                <label>dimensions</label>
                                <div class="value">90x60x90 cm</div>
                            </li>
                            <li>
                                <label>size</label>
                                <div class="value">one size fits all</div>
                            </li>
                            <li>
                                <label>color</label>
                                <div class="value">white</div>
                            </li>
                            <li>
                                <label>guarantee</label>
                                <div class="value">5 years</div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <div class="meta-row">
                            <div class="inline">
                                <label>SKU:</label>
                                <span>54687621</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>categories:</label>
                                <span><a href="#">-50% sale</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">desktop PC</a></span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>tag:</label>
                                <span><a href="#">fast</a>,</span>
                                <span><a href="#">gaming</a>,</span>
                                <span><a href="#">strong</a></span>
                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #additional-info -->


                    <div class="tab-pane" id="reviews">
                        <div class="comments">
                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar" src="assets/images/default-avatar.jpg">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">John Smith</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="4"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->

                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar" src="assets/images/default-avatar.jpg">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">Jane Smith</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="5"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->

                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar" src="assets/images/default-avatar.jpg">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">John Doe</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="3"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->
                        </div><!-- /.comments -->

                        <div class="add-review row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="new-review-form">
                                    <h2>Add review</h2>
                                    <form id="contact-form" class="contact-form" method="post" >
                                        <div class="row field-row">
                                            <div class="col-xs-12 col-sm-6">
                                                <label>name*</label>
                                                <input class="le-input" >
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <label>email*</label>
                                                <input class="le-input" >
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row star-row">
                                            <label>your rating</label>
                                            <div class="star-holder">
                                                <div class="star big" data-score="0"></div>
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row">
                                            <label>your review</label>
                                            <textarea rows="8" class="le-input"></textarea>
                                        </div><!-- /.field-row -->

                                        <div class="buttons-holder">
                                            <button type="submit" class="le-button huge">submit</button>
                                        </div><!-- /.buttons-holder -->
                                    </form><!-- /.contact-form -->
                                </div><!-- /.new-review-form -->
                            </div><!-- /.col -->
                        </div><!-- /.add-review -->

                    </div><!-- /.tab-pane #reviews -->
                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->
    <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->
    <!-- ========================================= RECENTLY VIEWED ========================================= -->
        <section id="recently-reviewd" class="wow fadeInUp">
            <div class="container">
                <div class="carousel-holder hover">

                    <div class="title-nav">
                        <h2 class="h1">最近浏览</h2>
                        <div class="nav-holder">
                            <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                            <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                        </div>
                    </div><!-- /.title-nav -->

                    <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
				        <? foreach ($historys as $h): ?>
                            <div class="no-margin carousel-item product-item-holder size-small hover">
                                <div class="product-item">
							        <? if ($h['product']['isnew'] == '1'): ?>
                                        <div class="ribbon blue"><span>新品</span></div>
							        <? endif; ?>
							        <? if ($h['product']['issale'] == '1'): ?>
                                        <div class="ribbon red"><span>在售</span></div>
							        <? endif; ?>
							        <? if ($h['product']['ishot'] == '1'): ?>
                                        <div class="ribbon green"><span>热门</span></div>
							        <? endif; ?>
                                    <div class="image">
                                        <img alt="" src="<? echo $h['product']['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $h['product']['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
                                    </div>
                                    <div class="body">
                                        <div class="title">
                                            <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $h['product']['id']]) ?>"><? echo $h['product']['title'] ?></a>
                                        </div>
                                        <div class="brand">Sharp</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-current text-right">￥<? echo $h['product']['saleprice'] ?></div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $h['product']['id'] ?>" style="cursor:pointer" class="le-button">添加到购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                            <a class="btn-add-to-compare" href="#">Compare</a>
                                        </div>
                                    </div>
                                </div><!-- /.product-item -->
                            </div><!-- /.product-item-holder -->
				        <? endforeach; ?>

                    </div><!-- /#recently-carousel -->

                </div><!-- /.carousel-holder -->
            </div><!-- /.container -->
        </section><!-- /#recently-reviewd -->
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
<?php
$cartindex = yii\helpers\Url::to(['cart/index']);
$auth = yii\helpers\Url::to(['member/auth']);
$js = <<<JS
$('#cart').on('click',function(){
    var productid = $(this).attr('productid');
    var auth = $(this).attr('auth');
    var url = "$cartindex";
    console.log(auth);
    if(auth){
        swal({
                    title: "您尚未登录，请登录后执行此操作！",
                    icon: 'warning',
                    text:'         ',
                    timer: 2000,
                    button: false
                })
                    .then(() => {
                        location.href = "$auth";
                    });
    }
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            productid:productid,
            position:'index/index'

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
                        location.reload();
                    });

            }else if(res.status ==0){
                swal({title: res.msg, icon: "warning"});
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