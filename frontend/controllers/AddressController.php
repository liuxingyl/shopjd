<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/25
 * Time: 22:20
 */

namespace frontend\controllers;


use common\models\Product;
use yii\web\Controller;

class AddressController extends BaseController
{
	public function actionLst(){
		if (\Yii::$app->request->isGet){
			$id = \Yii::$app->request->get('id');
			//$model = new Product();
			$products = Product::find()->where('cateid = :id',[":id" => $id])->all();
//var_dump($products);die;
			$this->layout = 'layout2';
			return $this->render('lst',[
				'products' => $products,
			]);
		}
		$this->layout = 'layout2';
		return $this->render('lst');
	}
    public function actionIndex(){
        $this->layout = 'layout2';
        return $this->render('index');
    }

    public function actionDetail(){
        $this->layout = 'layout2';
        return $this->render('detail');
    }
}