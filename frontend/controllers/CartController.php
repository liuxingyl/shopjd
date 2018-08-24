<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/25
 * Time: 22:27
 */

namespace frontend\controllers;

use common\models\Product;
use yii\web\Response;
use common\models\Cart;
use yii\web\Controller;

class CartController extends BaseController
{
    public function actionIndex(){
    	if(\Yii::$app->request->isAjax){
    		//var_dump(\Yii::$app->request->post());die;
    		if (\Yii::$app->request->post('position') == 'index/index'){
    			if (\Yii::$app->request->post('pnum') === '0') {
					return json_encode(['status' => 0,'msg' => '抱歉， 您没有选择数量！']);
    			}
			    $userid = \Yii::$app->user->id;
				$productid = \Yii::$app->request->post('productid');
				$product = Product::find()
					->where([
						'id' => $productid
					])
					->one();
				//var_dump($product);die;
				$price = $product->saleprice;
			    $model = new Cart();
			    $cart = Cart::find()
				    ->where([
					    'userid' => $userid,
					    'productid' => $productid
				    ])
				    ->select(['id','productnum'])
				    ->one();
			    if ($cart){
			    	if (!empty(\Yii::$app->request->post('pnum'))) {
						$cart->productnum = $cart->productnum + \Yii::$app->request->post('pnum');
					}else{
						$cart->productnum = $cart->productnum +1;
					}
			    	
			    	if ($cart->save()){
					    return json_encode(['status' => 1,'msg' => '添加购物车成功！']);
				    }
			    }

				if (!empty(\Yii::$app->request->post('pnum'))) {
					$model->productnum = \Yii::$app->request->post('pnum');
				}else{
					$model->productnum = 1;
				}
			   
			    $model->price = $price;
			    $model->userid = $userid;
			    $model->productid = $productid;
			    if (!$model->save()){
				    \Yii::$app->getSession()->setFlash('error', '操作失败!');
				    return $this->redirect("http://shopjd.com/index.php?r=product/lst");
			    }
				if ($model->save()){
			    	return json_encode(['status' => 1,'msg' => '添加购物车成功！']);
				}
		    }
    		//var_dump(\Yii::$app->request->post());die;
		    if (\Yii::$app->request->post('num')){
			    $userid = \Yii::$app->user->id;
			    $productid = \Yii::$app->request->post('productid');

			    $cart = Cart::find()->where([
			    	'userid' => $userid,
				    'productid' => $productid,
				    ])->one();
			    $cart->productnum = \Yii::$app->request->post('num');
			    if (!$cart->save()){
				    \Yii::$app->getSession()->setFlash('error', '操作失败!');
				    return $this->redirect(["product/lst"]);
			    }
			    \Yii::$app->response->format=Response::FORMAT_JSON;
			    return ['status' => 1,'msg'=> "添加成功！"];
		    }
		    $userid = \Yii::$app->session['user']['id'];
		    $productid = \Yii::$app->request->post('productid');
		    $price = \Yii::$app->request->post('price');

		    $cart = Cart::find()->where([
			    'userid' => $userid,
			    'productid' => $productid,
		    ])->one();
		    if ($cart) {
				$cart->productnum = $cart->productid + 1;
			    if (!$cart->save()){
				    \Yii::$app->getSession()->setFlash('error', '操作失败!');
				    return $this->redirect("(['product/lst']");
			    }
			    \Yii::$app->response->format=Response::FORMAT_JSON;
			    return ['status' => 1,'msg'=> "添加购物车成功！"];
		    }

		    $model = new Cart();
		    $model->productnum = 1;
		    $model->price = $price;
		    $model->userid = $userid;
		    $model->productid = $productid;
		    if (!$model->save()){
			    \Yii::$app->getSession()->setFlash('error', '操作失败!');
			    return $this->redirect("['product/lst']");
		    }
			\Yii::$app->response->format=Response::FORMAT_JSON;
		    return ['status' => 1,'msg'=> "添加购物车成功！"];
	    }
	    $userid = \Yii::$app->user->id;

	    $carts = Cart::find()->where('userid = :u',[':u' => $userid])
		    ->joinWith('product')
		    ->all();
	    $totalprice = 0;
		foreach ($carts as $c){
			for ($i = 0; $i < $c->productnum;$i++){
				$totalprice += $c->price;
			}

		}
    	$this->layout = 'index1';
    	return $this->render('index',[
    		'carts' => $carts,
		    'totalprice' => $totalprice,
		    ]);

    }
    public function actionDel(){
    	if (\Yii::$app->request->isAjax){
		    $id = \Yii::$app->request->post('id');
		    //var_dump($id);die;
		    $cart = Cart::deleteAll('id = :i',[":i" =>$id]);
		    if (!$cart){
			    \Yii::$app->getSession()->setFlash('error', '操作失败!');
			    return $this->redirect(['product/lst']);
		    }
		    \Yii::$app->response->format=Response::FORMAT_JSON;
		    return ['status' => 1,'msg'=> "删除成功！"];

	    }



    }
}