<?php

namespace app\modules\admin\controllers;

use common\models\Category;
use common\models\Order;
use common\models\Product;
use yii\data\Pagination;
use yii\web\Response;
class OrderController extends BaseController
{
    public function actionLst()
    {
	    $product = Order::find()->joinWith(['user']);
	    //$products = \yii\helpers\ArrayHelper::toArray($products);
		$count = Order::find()->joinWith(['user'])->count();
    	$this->layout = 'iframe';
	    $pagination = new Pagination([
		    'totalCount' => $count,
		    'pageSize' => 15,

	    ]);

	    $products = $product->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();
        return $this->render('lst',[
        	'count' => $count,
	        'pagination' => $pagination,
	        'products' => $products,
        ]);
    }
}
