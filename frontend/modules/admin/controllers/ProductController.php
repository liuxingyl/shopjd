<?php

namespace app\modules\admin\controllers;

use common\models\Brand;
use common\models\Featured;
use common\models\Upload;
use common\models\Product;
use common\models\Soncate;
use yii\data\Pagination;
use yii\web\Response;
use crazyfd\qiniu\Qiniu;
use common\services\UtilService;
class ProductController extends BaseController
{

    public function actionLst()
    {
	    $product = Product::find()
		    ->joinWith(['soncate','featured','brand']);
		$count = Product::find()->joinWith('soncate')->count();

	    $pagination = new Pagination([
		    'totalCount' => $count,
		    'pageSize' => 8,

	    ]);
	    $products = $product->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();
    	$this->layout = 'iframe';
        return $this->render('lst',[
        	'count' => $count,
	        'pagination' =>$pagination,
	        'products' => $products,
        ]);
    }
	public function actionAdd(){
		$cates = Soncate::find()->asArray()->all();
		$featureds = Featured::find()->asArray()->all();
		if (\Yii::$app->request->isPost) {
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			if(empty($post['title'])){
				if ($post['isAdd'] == 'true'){
					$cateid = $post['id']['val'];
					$brands = Brand::find()
						->joinWith('cateBrand')
						->where(['jd_cate_brand.cateid' => $cateid])
						->asArray()
						->all();
					return json_encode(['status' => 1,'data'=> $brands]);
				}elseif ($post['isAdd'] == 'false'){
					return json_encode(['status' => 1,'data'=> ""]);
				}

			}


		}
		if (\Yii::$app->request->isAjax) {

			//var_dump($cover);die;
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$model = new Product();
			$model->title = $post['title'];
			$model->cateid = $post['cateid'];
			$model->brandid = $post['brandid'];
			$model->featuredid = $post['featuredid'];
			$model->description = $post['description'];
			$model->abstract = $post['abstract'];
			$model->cover = $post['cover'];
			$model->num = $post['num'];
			$model->price = $post['price'];
			$model->saleprice = $post['saleprice'];
			if (!empty($post['issale'])) {
				$model->issale = $post['issale'];
			}
			if (!empty($post['ishot'])) {
				$model->ishot = $post['ishot'];
			}
			if (!empty($post['isnew'])) {
				$model->isnew = $post['isnew'];
			}
			if (!$model->validate()){
				foreach ($model->errors as $e){

					return json_encode(['status' => 0,'msg'=> $e[0]]);
				}

			}
			if ($model->save()){
				return json_encode(['status' => 1,'msg'=> "添加商品成功！"]);
			}

		}
		$this->layout = 'alert';
		return $this->render('add',[
			'cates' => $cates,
			'featureds' => $featureds,
		]);
	}
	public function actionEdit(){
		$this->layout = 'alert';
		if (\Yii::$app->request->isGet) {
			$cates = Soncate::find()->asArray()->all();
			$featureds = Featured::find()->asArray()->all();
			$id = \Yii::$app->request->get('id');
			$product = Product::find()
				->where(['=', 'jd_product.id', $id])
				->one();
			$cateid = $product->cateid;
			$brands = Brand::find()
				->joinWith('cateBrand')
				->where(['jd_cate_brand.cateid' => $cateid])
				->all();
			//var_dump($brands);die;
			return $this->render('edit',[
				'cates' => $cates,
				'featureds' => $featureds,
				'product' => $product,
				'brands' => $brands,
			]);
		}
		if (\Yii::$app->request->isAjax) {
            $data = \Yii::$app->request->post();
            //var_dump($data);die;
            $id = $data['id'];
			$product = Product::find()->where(['=','id',$id])->one();
			//var_dump($product);die;
            unset($data['id']);
            unset($data['file']);
            if (empty($data['cover'])){
	            $data['cover'] = $product->cover;
            }
			//$data['brandid'] = intval($data['brandid']);
            $data['title'] = UtilService::htmlEncode($data['title']);
            $product->load($data,'');
            if(!$product->validate()){
	            foreach($product->errors as $v){
		            return json_encode(['status' => 0, 'msg' => $v['0']]);
	            }
            }
			//var_dump($data);die;
            $re = $product->save($data);
           // var_dump($re);die;
			if ($re) {
				return json_encode(['status' => 1, 'msg' => "修改商品成功！"]);
			}
		}


	}
	public function actionDel(){

		if (\Yii::$app->request->isAjax) {
			$id = \Yii::$app->request->post('id');
			$product  = Product::find()->where(['id' => $id])->one();
			$key = $product->cover;

			$key = substr($key,-13);
			//var_dump($key);die;
			$qiniu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);
			$qiniu->delete($key);
			if (Product::deleteAll('id = :id',[':id' => $id])){

				return json_encode(['status' => 1, 'msg' => "删除商品成功！"]);

			}


		}



	}
}
