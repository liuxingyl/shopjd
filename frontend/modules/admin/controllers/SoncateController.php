<?php

namespace app\modules\admin\controllers;

use common\models\Category;
use common\models\Product;
use common\models\Soncate;
use common\services\UtilService;
use crazyfd\qiniu\Qiniu;
use yii\web\Response;
class SoncateController extends BaseController
{
    public function actionLst()
    {
    	$cates = Soncate::find()->joinWith('category')->asArray()->all();
		//var_dump($cates);die;
    	$model = new Soncate();
	    $count = Soncate::find()->count();

	    if (\Yii::$app->request->isPost){
		    $post = \Yii::$app->request->post();
			$start = strtotime($post['start']);
			if ($start == ''){$start = 00000000000;}

		    $end = strtotime($post['end']);
		    if ($end == ''){$end = 99999999999;}
		    $username = $post['username'];
		    //var_dump($post);die;
		    $cates = Category::find()
			    ->where(['like','title',$username])
			    ->andWhere(['>=','update_time',$start])
			    ->andWhere(['<=','update_time',$end])
			    ->asArray()->all();
		    $count = count($cates);
		    //var_dump($data1);die;

	    }
    	$this->layout = 'iframe';
        return $this->render('lst',[
        	'cates' => $cates,
	        'count'=> $count,
	    ]);
    }
	public function actionEdit(){

		$id = \Yii::$app->request->get('id');

		$cate = Soncate::find()->where(['=','id',$id])->one();
		$cates = Category::find()->all();
		$this->layout = 'iframe';
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$id = $post['id'];
			$cateid = $post['cateid'];
			$title = $post['title'];
			$title = UtilService::htmlEncode($title);
			//var_dump($title);die;
			$cate = Soncate::find()->where(['id' => $id])->one();
			$cate->title = $title;
			$cate->cateid = $cateid;
			if (!$cate->validate()){
				foreach($cate->errors as $v){
					return json_encode(['status' => 0, 'msg' => $v['0']]);
				}
			}

			if (!$cate->save()){
				return json_encode(['status' => 0, 'msg' => "修改分类失败！"]);
			}
			if ($cate->save()){
				return json_encode(['status' => 1, 'msg' => "修改分类成功！"]);
			}

		}
		return $this->render('edit',[
			'cate' => $cate,
			'cates' => $cates,
		]);

	}
    public function actionAdd(){
	    $cates = Category::find()->all();

	    if (\Yii::$app->request->isAjax){
		    $post = \Yii::$app->request->post();
		    //var_dump($post);die;
		    $model = new Soncate();
		    $model->title = $post['title'];
		    $model->cateid = $post['cateid'];
		    if ($model->save()){
			    \Yii::$app->response->format=Response::FORMAT_JSON;
			    return ['status' => 1,'msg'=> "添加分类成功！"];
		    }

	    }
	    $this->layout = "alert";
	    return $this->render('add',[
		    'cates' => $cates,
	    ]);
    }
	public function actionDel(){
		if (\Yii::$app->request->isAjax) {
			$id = \Yii::$app->request->post('id');
			// 查出子分类下所有商品
			$products = Product::find()->where(['cateid' => $id])->all();
			if ($products){
				foreach ($products as $p){
					$key = $p->cover;

					$key = substr($key,-13);
					//var_dump($key);die;
					$qiniu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);
					$qiniu->delete($key);
					if (!$p->delete())
					{
						return json_encode(['status' => 0, 'msg' => "删除分类下商品失败！"]);
					}
				}
			}
			$re = Soncate::deleteAll('id = :i', [':i' => $id]);
			if ($re) {
				\Yii::$app->response->format = Response::FORMAT_JSON;
				return ['status' => 1, 'msg' => "删除分类成功！"];
			}
		}
	}

}
