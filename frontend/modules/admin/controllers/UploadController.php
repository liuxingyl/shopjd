<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/7/9
 * Time: 20:50
 */

namespace app\modules\admin\controllers;
use common\models\Product;
use crazyfd\qiniu\Qiniu;

use yii\web\Controller;

class UploadController extends BaseController
{
	public function actionUploadimg(){
		if (\Yii::$app->request->isAjax){
			//var_dump($_FILES);die;
			$qiniu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);
			$preurl = \Yii::$app->request->post('preurl');
			if (!empty($preurl)){
				//var_dump($product);die;
				$key = substr($preurl,-13);

				$qiniu->delete($key);
			}
			$key =  uniqid();
			$qiniu->uploadFile($_FILES['file']['tmp_name'],$key);
			$url = $qiniu->getLink($key);
			//var_dump($url);die;
			return json_encode(['status' => 1,'url'=> $url]);
		}
	}

}