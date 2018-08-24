<!-- /.megamenu-vertical -->
		<!-- ========================================= NAVIGATION : END ========================================= -->
		<div class="animate-dropdown"><!-- ========================================= BREADCRUMB ========================================= -->

			<!-- ========================================= BREADCRUMB : END ========================================= --></div>
	</header>
	<!-- ============================================================= HEADER : END ============================================================= -->		<section id="category-grid">
		<div class="container">



			<!-- ========================================= CONTENT ========================================= -->

			<div class="col-xs-12 col-sm-9 no-margin wide sidebar">


				<section id="gaming">
					<div class="grid-list-products">
						<h2 class="section-title">产品列表</h2>

						<div class="control-bar">
							<div id="popularity-sort" class="le-select" >
								<select data-placeholder="sort by popularity">
									<option value="1">1-100 条</option>
									<option value="2">101-200 条</option>
									<option value="3">200+ 条</option>
								</select>
							</div>

							<div id="item-count" class="le-select">
								<select>
									<option value="1">每页24 条</option>
									<option value="2">每页48 条</option>
									<option value="3">每页32 条</option>
								</select>
							</div>

							<div class="grid-list-buttons">
								<ul>
									<li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> 方格</a></li>
									<li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> 列表</a></li>
								</ul>
							</div>
						</div><!-- /.control-bar -->

						<div class="tab-content">
							<div id="grid-view" class="products-grid fade tab-pane in active">

								<div class="product-grid-holder">
									<div class="row no-margin">

									<? foreach ($products as $p): ?>
										<div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
											<div class="product-item">
												<div class="ribbon red"><span>sale</span></div>
												<div class="ribbon green"><span>bestseller</span></div>
												<div class="ribbon blue"><span>new!</span></div>
												<div class="image">
													<img alt="" src="<? echo $p->cover; ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $p->cover; ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
												</div>
												<div class="body">
													<div class="label-discount green">-50% sale</div>
													<div class="title">
                                                    <a href="single-product.html"><? echo $p->title; ?></a>
													</div>
													<div class="brand">sony</div>
												</div>
												<div class="prices">
													<div class="price-prev">￥<? echo $p->price; ?></div>
													<div class="price-current pull-right">￥<? echo $p->saleprice; ?></div>
												</div>
												<div class="hover-area">
													<div class="add-cart-button">
														<a auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $p->id ?>" style="cursor:pointer" class="le-button cart">添加到购物车</a>
													</div>
													<div class="wish-compare">
														<a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
														<a class="btn-add-to-compare" href="#">compare</a>
													</div>
												</div>
											</div><!-- /.product-item -->
										</div><!-- /.product-item-holder -->
                                    <? endforeach; ?>
									</div><!-- /.row -->
								</div><!-- /.product-grid-holder -->

								<div class="pagination-holder">
									<div class="row">

										<div class="col-xs-12 col-sm-6 text-left">
											<ul class="pagination ">
												<li class="current"><a  href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">下一页</a></li>
											</ul>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="result-counter">
<!--												Showing <span>1-9</span> of <span>11</span> results-->
											</div>
										</div>

									</div><!-- /.row -->
								</div><!-- /.pagination-holder -->
							</div><!-- /.products-grid #grid-view -->

							<div id="list-view" class="products-grid fade tab-pane ">
								<div class="products-list">
									<? foreach ($products as $p): ?>
									<div class="product-item product-item-holder">
										<div class="ribbon red"><span>sale</span></div>
										<div class="ribbon blue"><span>new!</span></div>
										<div class="row">
											<div class="no-margin col-xs-12 col-sm-4 image-holder">
												<div class="image">
													<img alt="" src="<? echo $p->cover; ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" data-echo="<? echo $p->cover; ?>?imageView2/1/w/194/h/141/q/75|watermark/2/text/6JOd54yr5ZWG5Z-O/font/6buR5L2T/fontsize/240/fill/I0UxMjEzQg==/dissolve/100/gravity/SouthEast/dx/10/dy/10" />
												</div>
											</div><!-- /.image-holder -->
											<div class="no-margin col-xs-12 col-sm-5 body-holder">
												<div class="body">
													<div class="label-discount green">-50% sale</div>
													<div class="title">
														<a href="single-product.html"><? echo $p->title; ?></a>
													</div>
													<div class="brand">sony</div>
													<div class="excerpt">
														<p><? echo $p->abstract; ?></p>
													</div>
													<div class="addto-compare">
														<a class="btn-add-to-compare" href="#">add to compare list</a>
													</div>
												</div>
											</div><!-- /.body-holder -->
											<div class="no-margin col-xs-12 col-sm-3 price-area">
												<div class="right-clmn">
													<div class="price-current">￥<? echo $p->saleprice; ?></div>
													<div class="price-prev">￥<? echo $p->price; ?></div>
													<div class="availability"><label>库存 :</label><span class="available">  335</span></div>
													<a class="le-button cart" auth="<? echo \Yii::$app->user->isGuest ?>" productid="<? echo $p->id ?>" style="cursor:pointer">添加购物车</a>
													<a class="btn-add-to-wishlist" href="#">添加到收藏夹</a>
												</div>
											</div><!-- /.price-area -->
										</div><!-- /.row -->
									</div><!-- /.product-item -->
									<? endforeach; ?>

								</div><!-- /.products-list -->

								<div class="pagination-holder">
									<div class="row">
										<div class="col-xs-12 col-sm-6 text-left">
											<ul class="pagination">
												<li class="current"><a  href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">下一页</a></li>
											</ul><!-- /.pagination -->
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="result-counter">
<!--												Showing <span>1-9</span> of <span>11</span> results-->
											</div><!-- /.result-counter -->
										</div>
									</div><!-- /.row -->
								</div><!-- /.pagination-holder -->

							</div><!-- /.products-grid #list-view -->

						</div><!-- /.tab-content -->
					</div><!-- /.grid-list-products -->

				</section><!-- /#gaming -->
			</div><!-- /.col -->
			<!-- ========================================= CONTENT : END ========================================= -->
		</div><!-- /.container -->
	</section><!-- /#category-grid -->		<!-- ============================================================= FOOTER ============================================================= -->
<?php
$cartindex = yii\helpers\Url::to(['cart/index']);
$auth = yii\helpers\Url::to(['member/auth']);
$js = <<<JS
$(".filter-button").on('click',function(){
        var price = $("#price").val();
        
            alert(price);
        var url = "$cartindex";
        $.ajax({
            url : url,
            async: false,
            type : "post",
            //data : {ids:JSON.stringify(ids)},
            data : {
                productid:productid,
                price:price,
            },
            dataType : "json",
            success : function(res) {
                //alert(res);

                if (res.status == 1) {
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
    
$('.cart').on('click',function(){
    var productid = $(this).attr('productid');
    var auth = $(this).attr('auth');
    var url = "$cartindex";
    if(auth){
        swal({
                    title: "您尚未登录，请登录后执行此操作！",
                    icon: 'warning',
                    text:'         ',
                    timer: 1000,
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
