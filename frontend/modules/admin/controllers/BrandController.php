<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 13:06
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Rbac;
use app\modules\admin\models\Admin;
use common\models\Brand;
use common\models\CateBrand;
use common\models\Product;
use common\models\Soncate;
use crazyfd\qiniu\Qiniu;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class BrandController extends BaseController
{
	/**
	 * 品牌列表
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/7/30
	 * Time: 8:52
	 */
    public function actionLst()
    {
        $this->layout = 'iframe';

        //var_dump($admins);die;

        $brand = Brand::find()
	        ->joinWith('cateBrand');
        $count = $brand->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 15,

            ]);

	    $brands = $brand->offset($pagination->offset)
            ->limit($pagination->limit)
		    ->orderBy('id asc')
            ->all();
        return $this->render('lst',[
            'brands' => $brands,
            'pagination' =>$pagination,
            'count' => $count,
        ]);
    }

	/**添加
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 12:54
	 */
	public function actionAdd()
	{
		if (\Yii::$app->request->isGet) {
			$cates = Soncate::find()->asArray()->all();
			$this->layout = "alert";
			return $this->render('Add',[
				'cates' => $cates,
			]);
		}
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			$title = $post['title'];
			$logo = $post['logo'];
			$cateid = $post['cateid'];
			$trans = \Yii::$app->db->beginTransaction();
			try {
				$model = new Brand();
				$model->title = $title;
				$model->logo = $logo;
				if (!$model->save()){
					return json_encode(['status' => 0,'msg'=> "添加品牌失败！"]);
				}
				if (empty($cateid)){
					return json_encode(['status' => 0,'msg'=> "没有选择分类！"]);
				}
				$brandid = Brand::find()
					->where(['title' => $title])
					->one();

				$brandid = $brandid->id;
				//var_dump($brandid);die;

				//var_dump($cateid);die;
				foreach ($cateid as $c){
					$cateBrand = new CateBrand();
					$cateBrand->cateid = (int)$c;
					$cateBrand->brandid = (int)$brandid;
					$re = $cateBrand->save();
					if (!$re){
						return json_encode(['status' => 0,'msg'=> "添加失败！"]);
					}
				}
				$trans->commit();
				return json_encode(['status' => 1,'msg'=> "添加品牌成功！"]);

			}catch(\Exception $e) {
				if (\Yii::$app->db->getTransaction()) {
					$trans->rollback();
					return json_encode(['status' => 0,'msg'=> "添加失败！"]);
				}
			}



		}


	}

	/**编辑
	 * @return array|string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 16:36
	 */
	public function actionEdit()
	{
		$this->layout = "alert";
		if (\Yii::$app->request->isGet) {

			$id = \Yii::$app->request->get('id');
			$brand = Brand::find()
				->joinWith('cateBrand')
				->where(['jd_brand.id' => $id])

				->one();
			//var_dump($brand['cateBrand'][0]['soncate']);die;
			$cates = Soncate::find()
				->asArray()
				->all();

			return $this->render('edit',[
				'brand' => $brand,
				'cates' => $cates,
			]);

		}
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$model = new Brand();
			$model->title = $post['title'];
			if (!empty($post['logo'])){
				$model->logo = $post['logo'];
			}
			if (!$model->save()){
				return json_encode(['status' => 0,'msg'=> "修改失败！"]);
			}
			CateBrand::deleteAll(['brandid' => $post['id']]);
			foreach ($post['cateid'] as $c){
				$model = new CateBrand();
				$model->cateid = (int)$c;
				$model->brandid = (int)$post['id'];
				if (!$model->save()){
					return json_encode(['status' => 0,'msg'=> "修改失败！"]);
				}
			}
			return json_encode(['status' => 1,'msg'=> "修改成功！"]);

		}


	}

	/**删除
	 * @return array|string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 20:55
	 */
	public function actionDel()
	{
		if (\Yii::$app->request->isAjax){
			$id = \Yii::$app->request->post('id');
			$brand = Brand::find()->where(['=','id' , $id])->one();
			$key = $brand->logo;

			$key = substr($key,-13);
			//var_dump($key);die;
			$qiniu = new Qiniu(Product::AK,Product::SK,Product::DOMAIN,Product::BUCKET);
			$qiniu->delete($key);



			if (!Brand::deleteAll(['id' => $id])){
				return json_encode(['status' => 0,'msg'=> "删除失败！"]);
			}


			if (!CateBrand::deleteAll(['brandid' => $id])){
				return json_encode(['status' => 0,'msg'=> "删除失败！"]);
			}


			return json_encode(['status' => 1,'msg'=> "删除品牌成功！"]);
		}
	}

}