<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/25
 * Time: 22:35
 */

namespace frontend\controllers;

use common\models\Order;
use yii\web\Response;
use common\models\Cart;
use common\models\Address;
use common\models\OrderDetail;
use yii\web\Controller;

class OrderController extends BaseController
{
    public function actionCheck(){

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
	    $address = Address::find()->where('userid = :u and defa = :d',[
	    	":u" => $userid,
		    ":d" => "1",
		    ])->one();
	    //var_dump($address);die;
        $this->layout = 'index1';
        return $this->render('check',[
        	'carts' => $carts,
	        'totalprice' => $totalprice,
	        'address' => $address
        ]);
    }

    public function actionCreate(){
    	if (\Yii::$app->request->isAjax){
    		$post = \Yii::$app->request->post();
		    //var_dump($post);die;
		    $productid = $post['productid'];
		    $num = $post['num'];
		    $phone = $post['phone'];
		    $name = $post['name'];
		    $address = $post['address'];
		    $totalprice = $post['totalprice'];
    		//var_dump(json_decode($title));
		    //var_dump($addressid);
		    $productidArr = json_decode($productid);
		    $numArr = json_decode($num);
		    $arr = array(array());
		    //var_dump($productidArr);

		    //var_dump($numArr);
		    // 重组两个索引数组 形成一个关联数组
		   foreach ($numArr as $k => $v){
		   	    if (array_key_exists($k, $productidArr)){
		   	    	$arr[$k]['productid'] = $productidArr[$k];
			        $arr[$k]['num'] = $v;
		        }
		   }

		    //var_dump($arr);die;
		    /**
		     * 判断收货人是否有收获地址
		     * 如果没有（清收货人添加收货地址 并存入数据库）
		     *
		     * 如果有收货地址 请收货人选择收货地址 获得 address 表 逐渐id
		     *
		     * 事务
		     * 1 生成订单
		     * 2 订单入库
		     *
		     * 3 订单详情表入库
		     */
		    //判断收货人是否有收获地址
		    $re = Address::find()->where('name = :n and phone = :p and address = :a and userid = :u',[
		    	':n' => $name,
			    ':p' => $phone,
			    ':a' => $address,
			    ':u' => \Yii::$app->session['user']['id'],
		    	])->one();
		    //var_dump($re);die;
		    //若果不存在 则添加地址
		    if(!$re){
		    	$model = new Address();
		    	$model->name = $name;
			    $model->phone = $phone;
			    $model->address = $address;
			    $model->userid = \Yii::$app->user->id;
			    if (!$model->save()){
				    \Yii::$app->getSession()->setFlash('error', '操作失败!');
				    return $this->redirect("http://shopjd.com/index.php?r=product/lst");
			    }
		    }
		    // 开始订单入库

		    $trans = \Yii::$app->db->beginTransaction();
		    try {
			    $orderID = \common\help\order::orderID();

			    $userid = \Yii::$app->user->id;
			    $address = Address::find()->where('name = :n and phone = :p and address = :a and userid = :u',[
				    ':n' => $name,
				    ':p' => $phone,
				    ':a' => $address,
				    ':u' => $userid,
			    ])->one();
			    //var_dump($address->id);die;
			    $addressid = $address->id;
			    //var_dump($address);die;
			    $order = new Order();
			    $order->orderID = $orderID;
			    $order->userid = $userid;
			    $order->totalprice = $totalprice;
			    $order->addressid = $addressid;
			    $order->status = -1;
			    $re = $order->save();
			    if (!$re) {
				    \Yii::$app->response->format=Response::FORMAT_JSON;
				    return ['status' => 0,'msg'=> "操作失败！"];
			    }

			    $order1 = Order::find()->where('orderID = :u',[':u' => $orderID])->one();

			    $orderid = $order1->id;

			    foreach($arr as $v)
			    {
				    $model  = new OrderDetail();
				    $model->productid = $v['productid'];
				    $model->productnum = $v['num'];
				    $model->orderid = $orderid;
				    if (!$model->save()) {
					    \Yii::$app->response->format=Response::FORMAT_JSON;
					    return ['status' => 0,'msg'=> "操作失败！"];
					    //throw new \Exception();
				    }
				}

			    $trans->commit();
			    \Yii::$app->response->format=Response::FORMAT_JSON;
			    return [
			    	'status' => 1,
				    'totalprice'=> $totalprice,
				    'name' => $name,
				    'phone' => $phone,
				    'address' => $post['address'],
				    ];

		    }catch(\Exception $e) {
			    if (\Yii::$app->db->getTransaction()) {
				    $trans->rollback();
			    }
		    }

	    }

    }

	/**
	 * 确认订单并支付
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/7/4
	 * Time: 17:16
	 */
	public function actionPay(){


		//var_dump($address);die;
		$this->layout = 'layout2';
		return $this->render('pay');
	}
	public function actionLst(){
		$orders = Order::find()->joinWith(['orderDetail'])->where(['userid' => \Yii::$app->user->id])->all();

		$orderDetails = OrderDetail::find()->joinWith('product')->all();
		//var_dump($orderDetails);die;
		$this->layout = 'index1';
		return $this->render('lst',[
			'orders' => $orders,
			'orderDetails' => $orderDetails,
		]);
	}
}