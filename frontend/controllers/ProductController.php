<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/25
 * Time: 22:20
 */

namespace frontend\controllers;


use common\models\Brand;
use common\models\Category;
use common\models\History;
use common\models\Product;
use common\models\Soncate;
use yii\web\Controller;

class ProductController extends BaseController
{
	protected $except = ["*"];
	public function actionLst(){
		if (\Yii::$app->request->isGet){
			$id = \Yii::$app->request->get('id');
			//$model = new Product();
			$products = Product::find()
				->joinWith('brand')
				->where('cateid = :id',[":id" => $id])
				->all();
//
			$brands = Brand::find()
				->joinWith('cateBrand')
				->where(['jd_cate_brand.cateid' => $id])

				->all();

			$this->layout = 'index1';
			return $this->render('lst',[
				'products' => $products,
				'brands' => $brands,
			]);
		}
		$this->layout = 'index1';
		return $this->render('lst');
	}
    public function actionIndex(){
        $this->layout = 'layout2';
        return $this->render('index');
    }

    public function actionDetail(){
	    if (!\Yii::$app->request->isGet){
		    \Yii::$app->session->setFlash('error', '非法请求!');
			return $this->redirect($_SERVER['HTTP_REFERER']);
	    }
	    if (\Yii::$app->request->isGet){
		    $id = \Yii::$app->request->get('id');
		    if (!\Yii::$app->user->isGuest){
			    $userid = \Yii::$app->user->id;
			    $historys = History::find()
				    ->where(['userid' => $userid])
				    ->orderBy('id desc')
				    ->asArray()
				    ->all();
			    foreach ($historys as $h){
				    if ($id == $h['productid']){
					    History::deleteAll(['productid' => $id]);
				    }
			    }
			    $history = new History();
			    $history->userid = $userid;
			    $history->productid = $id;
			    $history->save();
		    }

			$product = Product::find()->where('id = :i',[':i' => $id])->one();
		    //获取浏览历史
		    $historys = History::find()
			    ->joinWith('product')
			    ->where(['userid' => \Yii::$app->user->id])
			    ->orderBy('id desc')
			    ->limit('20')
			    ->asArray()
			    ->all();
	    }
        $this->layout = 'index1';
        return $this->render('detail',[
        	'product' => $product,
	        'historys' => $historys,
        ]);
    }
	public function actionSearch(){
		if (\Yii::$app->request->isPost){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$title = $post['title'];
			$cate = $post['cate'];
			if ($cate != '全部分类'){
				$cate = Category::find()
					->where(['title' => $cate])
					->one();
				$cateid = $cate->id;
				$soncate = Soncate::find()
					->where(['cateid' => $cateid])
					->all();
				foreach ($soncate as $s){
					$cateidarr[] = $s->id;
				}
				//var_dump($cateidarr);die;
				//$model = new Product();
				$products = Product::find()
					->where(['like','title',$title])
					->andWhere(['in','cateid',$cateidarr])
					->all();
				$this->layout = 'index1';
				return $this->render('search',[
					'products' => $products,
				]);
			}
			$products = Product::find()
				->where(['like','title',$title])
				->all();
			$this->layout = 'index1';
			return $this->render('search',[
				'products' => $products,
			]);
		}
	}
}