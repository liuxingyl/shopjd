<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 20:16
 */

namespace app\modules\admin\controllers;

use yii\web\Response;
use common\models\Profile;
use common\models\User;
use yii\data\Pagination;
class UserController extends BaseController
{
	/**会员列表
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 20:17
	 */
	public function actionLst()
	{
		//var_dump($admins);die;

		$model = User::find()->joinWith('profile');
		$pageSize = \Yii::$app->params['pageSize']['user'];
		$count = $model->count();
		$pagination = new Pagination([
			'totalCount' => $count,
			'pageSize' => $pageSize,

		]);
		$users = $model->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
		//var_dump($users);die;
		$this->layout = 'iframe';
		return $this->render('Lst',[
			'users' => $users,
			'pagination' =>$pagination,
			'count' => $count,
		]);
	}

	/**会员删除
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 21:33
	 */
	public function actionDel()
	{
		if (!\Yii::$app->request->isAjax) {
			\Yii::$app->response->format=Response::FORMAT_JSON;
			return ['status' => 0,'msg'=> "请求错误！"];
		}
		if (\Yii::$app->request->isAjax) {
			try {
				$id = \Yii::$app->request->post('id');
				$trans = \Yii::$app->db->beginTransaction();
				if ($obj = Profile::find()->where('userid = :id', [':id' => $id])->one()) {
					$res = Profile::deleteAll('userid = :id', [':id' => $id]);
					if (!$res) {
						throw new \Exception();
					}
				}
				if (!User::deleteAll('id = :id', [':id' => $id])) {
					throw new \Exception();
				}
				$trans->commit();
				}catch(\Exception $e) {
				if (\Yii::$app->db->getTransaction()) {
					$trans->rollback();
				}
			}
			\Yii::$app->response->format=Response::FORMAT_JSON;
			return ['status' => 1,'msg'=> "删除管理员成功！"];

		}
	}

}