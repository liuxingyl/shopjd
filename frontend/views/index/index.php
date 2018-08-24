

    <!-- ============================================================= HEADER : END ============================================================= -->		<div id="top-banner-and-menu">
        <div class="container">

            <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown">
                    <div class="head"><i class="fa fa-list"></i>全部分类</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
	                        <? foreach ($cates as $cate): ?>
                            <li class="dropdown menu-item">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><? echo $cate->title; ?></a>
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                        <div class="row">
                                            <div class="col-xs-12 col-lg-4">
                                                <ul>
	                                                <? foreach ($cate->soncate as $c): ?>

                                                    <li>
                                                        <a href="<?php echo yii\helpers\Url::to(['product/lst','id' => $c->id])?>">

                                                            <? echo $c->title; ?>

                                                        </a>
                                                    </li>
                                                    <? endforeach; ?>
                                                    <li>
                                                        <a href="#">
			                                                XXXXX
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <ul>
                                                    <li><a href="#">Power Supplies Power</a></li>
                                                    <li><a href="#">Power Supply Testers Sound</a></li>
                                                    <li><a href="#">Sound Cards (Internal)</a></li>
                                                    <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </div>

                                            <div class="dropdown-banner-holder">
                                                <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a>
                                            </div>
                                        </div>
                                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                    </li>
                                </ul>
                            </li><!-- /.menu-item -->
                            <? endforeach; ?>

                        </ul><!-- /.nav -->
                    </nav><!-- /.megamenu-horizontal -->
                </div><!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->		</div><!-- /.sidemenu-holder -->

            <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <div class="item" style="background-image: url(/assets/images/sliders/slider01.jpg);">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left">
                                    <div class="big-text fadeInDown-1">
                                        <span class="big"><span class="sign"></span</span>
                                    </div>

                                    <div class="excerpt fadeInDown-2">
                                        <br>
                                        <br>

                                    </div>
                                    <div class="small fadeInDown-2">

                                    </div>
<!--                                    <div class="button-holder fadeInDown-3">-->
<!--                                        <a href="single-product.html" class="big le-button ">shop now</a>-->
<!--                                    </div>-->
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->

                        <div class="item" style="background-image: url(/assets/images/sliders/slider03.jpg);">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left">
                                    <div class="big-text fadeInDown-1">
                                        <span class="big"><span class="sign"></span></span>Discount?
                                    </div>

                                    <div class="excerpt fadeInDown-2">
                                         <br><br>
                                    </div>
                                    <div class="small fadeInDown-2">

                                    </div>
<!--                                    <div class="button-holder fadeInDown-3">-->
<!--                                        <a href="single-product.html" class="big le-button ">shop now</a>-->
<!--                                    </div>-->
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->

                    </div><!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->
            </div><!-- /.homebanner-holder -->

        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->

    <!-- ========================================= HOME BANNERS ========================================= -->
    <section id="banner-holder" class="wow fadeInUp">
        <div class="container">
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="category-grid-2.html">
                    <div class="banner-text theblue">
                        <h1>  </h1>
                        <span class="tagline">  </span>
                    </div>
                    <img class="banner-image" alt="" src="/assets/images/blank.gif" data-echo="/assets/images/banners/banner-narrow-02.jpg" />
                </a>
            </div>
            <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                <a href="category-grid-2.html">
                    <div class="banner-text right">
                        <h1>  </h1>
                        <span class="tagline">  </span>
                    </div>
                    <img class="banner-image" alt="" src="/assets/images/blank.gif" data-echo="/assets/images/banners/banner-narrow-02.jpg" />
                </a>
            </div>
        </div><!-- /.container -->
    </section><!-- /#banner-holder -->
    <!-- ========================================= HOME BANNERS : END ========================================= -->
    <div id="products-tab" class="wow fadeInUp">
        <div class="container">
            <div class="tab-holder">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" >
                    <li class="active"><a href="#featured" data-toggle="tab">首页推荐</a></li>
	                <? foreach ($featureds as $f): ?>
                    <li><a href="#<? echo $f->id ?>" data-toggle="tab"><? echo $f->title ?></a></li>
	                <? endforeach; ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="featured">
                        <div id="ist" class="product-grid-holder">

                            <? foreach ($istui as $t): ?>
                            <div  class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <? if ($t->isnew == '1'): ?>
                                    <div class="ribbon blue"><span>新品</span></div>
                                    <? endif; ?>
	                                <? if ($t->issale == '1'): ?>
                                    <div class="ribbon red"><span>在售</span></div>
	                                <? endif; ?>
	                                <? if ($t->ishot == '1'): ?>
                                    <div class="ribbon green"><span>热门</span></div>
                                    <? endif; ?>
                                    <div class="image">
                                        <img alt="" src="<? echo $t->cover ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $t->cover ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $t->id]) ?>"><? echo $t->title ?></a>
                                        </div>
                                        <div class="brand"><? echo $t->brand->title ?></div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<? echo $t->price ?></div>
                                        <div class="price-current pull-right">￥<? echo $t->saleprice ?></div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $t->id ?>" style="cursor:pointer" class="le-button cart">添加到购物车</a>
                                        </div>

                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? endforeach; ?>
                        </div>
                        <div id="istui" class="loadmore-holder text-center">
                            <a  class="btn-loadmore">
                                <i class="fa fa-plus"></i>
                                加载更多商品</a>
                        </div>


                    </div>
                    <? foreach ($arr as $k => $a): ?>
                    <div class="tab-pane" id="<? echo $a[0]['featuredid'] ?>">
                        <div class="product-grid-holder <? echo $a[0]['featured']->title ?>">


	                        <? foreach ($a as $a1): ?>
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <? if ($a1['isnew'] == '1'): ?>
                                    <div class="ribbon blue"><span>新品</span></div>
                                    <? endif; ?>
	                                <? if ($a1['issale'] == '1'): ?>
                                    <div class="ribbon red"><span>在售</span></div>
	                                <? endif; ?>
	                                <? if ($a1['ishot'] == '1'): ?>
                                    <div class="ribbon green"><span>热门</span></div>
                                    <? endif; ?>
                                    <div class="image">
                                        <img alt="" src="<? echo $a1['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $a1['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $a1['id']]) ?>"><? echo $a1['title'] ?></a>
                                        </div>
                                        <div class="brand"><? echo $a1['brand']['title'] ?></div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<? echo $a1['price'] ?></div>
                                        <div class="price-current pull-right">￥<? echo $a1['saleprice'] ?></div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $a1['id'] ?>" style="cursor:pointer" class="le-button cart">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <? endforeach; ?>


                        </div>
                        <div  a="<? echo $a[0]['featuredid'] ?>" class="loadmore-holder text-center">
                            <a class="btn-loadmore">
                                <i class="fa fa-plus"></i>
                                加载更多商品</a>
                        </div>

                    </div>
                    <? endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ========================================= BEST SELLERS ========================================= -->
    <section id="bestsellers" class="color-bg wow fadeInUp">
        <div class="container">
            <h1 class="section-title">畅销商品</h1>

            <div class="product-grid-holder medium">
                <div class="col-xs-12 col-md-7 no-margin">

                    <div class="row no-margin">

                        <? foreach ($changxiao1 as $c): ?>
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                            <div class="product-item">
                                <div class="image">
                                    <img alt="" src="<? echo $c['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $c['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $c['id']]) ?>"><? echo mb_substr($c['title'],0,14,'utf8') ?>...</a>
                                    </div>
                                    <div class="brand">canon</div>
                                </div>
                                <div class="prices">
                                    <div class="price-current text-right">￥<? echo $c['saleprice'] ?></div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $c['id'] ?>" style="cursor:pointer" class="le-button cart">添加到购物车</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
                                        <a class="btn-add-to-compare" href="#">Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.product-item-holder -->
                        <? endforeach; ?>

                    </div><!-- /.row -->

                    <div class="row no-margin">

		                <? foreach ($changxiao2 as $c): ?>
                            <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                                <div class="product-item">
                                    <div class="image">
                                        <img alt="" src="<? echo $c['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $c['cover'] ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $c['id']]) ?>"><? echo mb_substr($c['title'],0,14,'utf8') ?>...</a>
                                        </div>
                                        <div class="brand">canon</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-current text-right">￥<? echo $c['saleprice'] ?></div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? $c['id'] ?>" style="cursor:pointer" class="le-button cart">添加到购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
                                            <a class="btn-add-to-compare" href="#">Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.product-item-holder -->
		                <? endforeach; ?>

                    </div><!-- /.row -->
                </div><!-- /.col -->
                <div class="col-xs-12 col-md-5 no-margin">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="<? echo $top['cover'] ?>">
                                    <img alt="" width="67" src="<? echo $top['cover'] ?>" data-echo="<? echo $top['cover'] ?>" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide2">
                                <a data-rel="prettyphoto" href="<? echo $top['cover'] ?>">
                                    <img alt="" width="67" src="<? echo $top['cover'] ?>" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide3">
                                <a data-rel="prettyphoto" href="<? echo $top['cover'] ?>">
                                    <img alt="" width="67" src="<? echo $top['cover'] ?>" data-echo="<? echo $top['cover'] ?>" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                        </div><!-- /.single-product-slider -->

                        <div class="gallery-thumbs clearfix">
                            <ul>
                                <li><a class="horizontal-thumb active" data-target="#best-seller-single-product-slider" data-slide="0" href="#slide1"><img alt="" width="67" src="<? echo $top['cover'] ?>" data-echo="<? echo $top['cover'] ?>" /></a></li>
                                <li><a class="horizontal-thumb" data-target="#best-seller-single-product-slider" data-slide="1" href="#slide2"><img alt="" width="67" src="<? echo $top['cover'] ?>" data-echo="<? echo $top['cover'] ?>" /></a></li>
                                <li><a class="horizontal-thumb" data-target="#best-seller-single-product-slider" data-slide="2" href="#slide3"><img alt="" width="67" src="<? echo $top['cover'] ?>" data-echo="<? echo $top['cover'] ?>" /></a></li>
                            </ul>
                        </div><!-- /.gallery-thumbs -->

                        <div class="body">
                            <div class="label-discount clear"></div>
                            <div class="title">
                                <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $top['id']]) ?>"><? echo $top['title'] ?></a>
                            </div>
                            <div class="brand">sony</div>
                        </div>
                        <div class="prices text-right">
                            <div class="price-current inline">￥<? echo $top['saleprice'] ?></div>
                            <a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $top['id'] ?>" style="cursor:pointer" class="le-button big inline cart">添加到购物车</a>
                        </div>
                    </div><!-- /.product-item-holder -->
                </div><!-- /.col -->

            </div><!-- /.product-grid-holder -->
        </div><!-- /.container -->
    </section><!-- /#bestsellers -->
    <!-- ========================================= BEST SELLERS : END ========================================= -->
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
                                    <a href="<? echo yii\helpers\Url::to(['product/detail','id' => $h['product']['id']]) ?>"><? echo mb_substr($h['product']['title'],0,14,'utf8') ?>...</a>
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
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->
    <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder" >

                <div class="title-nav">
                    <h1>畅销品牌</h1>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-brands" class="owl-carousel brands-carousel">
                    <? foreach ($brands as $b): ?>
                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="<? echo $b->logo ?>?imageMogr2/auto-orient/thumbnail/80x40/gravity/Center/crop/80x40/blur/1x0/quality/75|imageslim" />
                        </a>
                    </div><!-- /.carousel-item -->
                    <? endforeach; ?>

                </div><!-- /.brands-caresoul -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
<?php
$url = yii\helpers\Url::to(['index/index']);
$cart = yii\helpers\Url::to(['cart/index']);
$auth = yii\helpers\Url::to(['member/auth']);
$js = <<<JS
$("#istui").click(function () {
    var url = "$url";
    //console.log(url);
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
          id:'istui',

        },
        dataType : "json",
        success : function(res) {
            //alert(res);
            var html = ''
            if (res.status == 1) {
                Object.keys(res.msg).forEach(function(key){
                    console.log(res.msg[key]);
                    html +=' <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">';
                    html += '<div class="product-item">';

                    html += '<div class="image">';
                    html += '<img alt="" src=' + res.msg[key].cover + '?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10 data-echo=' + res.msg[key].cover + '?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10 /></div>'
                    html += ' <div class="body"><div class="label-discount clear"></div><div class="title">';
                    html += '<a href="single-product.html">'+ res.msg[key].title +'</a></div> <div class="brand">'+res.msg[key].brand+'</div></div><div class="prices"><div class="price-prev">';
                    html += '￥'+res.msg[key].price;
                    html += '</div><div class="price-current pull-right">￥' + res.msg[key].saleprice;
                    html += '</div> </div><div class="hover-area"> <div class="add-cart-button">'
                    html += ' <a href="single-product.html" class="le-button">添加到购物车</a></div> <div class="wish-compare"><a class="btn-add-to-wishlist" href="#">添加到收藏夹</a> <a class="btn-add-to-compare" href="#">compare</a> </div> </div> </div> </div>'


                });
                $("#ist").append(html);


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

$(".text-center").on('click',function () {
    var url = "$url";
    var featuredid = $(this).attr('a');
    console.log(featuredid);
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            featuredid:featuredid,

        },
        dataType : "json",
        success : function(res) {
            //alert(res);
            var html = ''
            if (res.status == 1) {
                Object.keys(res.msg).forEach(function(key){
                    console.log(res.msg[key]);
                    html +=' <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">';
                    html += '<div class="product-item">';

                    html += '<div class="image">';
                    html += '<img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-04.jpg" /></div>'
                    html += ' <div class="body"><div class="label-discount clear"></div><div class="title">';
                    html += '<a href="single-product.html">'+ res.msg[key].title +'</a></div> <div class="brand">acer</div></div><div class="prices"><div class="price-prev">';
                    html += res.msg[key].brand+'￥'+res.msg[key].price;
                    html += '</div><div class="price-current pull-right">￥' + res.msg[key].saleprice;
                    html += '</div> </div><div class="hover-area"> <div class="add-cart-button">'
                    html += ' <a href="single-product.html" class="le-button">添加到购物车</a></div> <div class="wish-compare"><a class="btn-add-to-wishlist" href="#">添加到收藏夹</a> <a class="btn-add-to-compare" href="#">compare</a> </div> </div> </div> </div>'


                });



                    $(".新品预告").append(html);



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
$(".text-center").on('click',function () {
    var url = "$url";
    var featuredid = $(this).attr('a');
    console.log(featuredid);
    $.ajax({
        url : url,
        async: false,
        type : "post",
        //data : {ids:JSON.stringify(ids)},
        data : {
            featuredid:featuredid,

        },
        dataType : "json",
        success : function(res) {
            //alert(res);
            var html = ''
            if (res.status == 1) {
                Object.keys(res.msg).forEach(function(key){
                    console.log(res.msg[key]);
                    html +=' <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">';
                    html += '<div class="product-item">';

                    html += '<div class="image">';
                    html += '<img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-04.jpg" /></div>'
                    html += ' <div class="body"><div class="label-discount clear"></div><div class="title">';
                    html += '<a href="single-product.html">'+ res.msg[key].title +'</a></div> <div class="brand">acer</div></div><div class="prices"><div class="price-prev">';
                    html += res.msg[key].title+'￥'+res.msg[key].price;
                    html += '</div><div class="price-current pull-right">￥' + res.msg[key].saleprice;
                    html += '</div> </div><div class="hover-area"> <div class="add-cart-button">'
                    html += ' <a href="single-product.html" class="le-button">添加到购物车</a></div> <div class="wish-compare"><a class="btn-add-to-wishlist" href="#">添加到收藏夹</a> <a class="btn-add-to-compare" href="#">compare</a> </div> </div> </div> </div>'


                });



                $(".销量最高").append(html);



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
$('.cart').on('click',function(){
    var productid = $(this).attr('productid');
    var auth = $(this).attr('auth');
    var url = "$cart";
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