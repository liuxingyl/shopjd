<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 13:06
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Rbac;
use backend\models\Admin;
use common\models\User;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Response;

class UserController extends BaseController
{


    public function actionLst()
    {
        $this->layout = 'iframe';

        //var_dump($admins);die;

        $user = User::find()->joinWith('profile');
        $count = User::find()->joinWith('profile')->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 8,

            ]);

	    $users = $user->offset($pagination->offset)
            ->limit($pagination->limit)
		    ->orderBy('status asc')
            ->all();
        //var_dump($admin);die;
        return $this->render('Lst',[
            'users' => $users,
            'pagination' =>$pagination,
            'count' => $count,
        ]);
    }

	/**
	 * 状态修改
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/7/18
	 * Time: 22:26
	 */
	public function actionJinyong()
	{
		if (\Yii::$app->request->isAjax){
			$id = \Yii::$app->request->post('id');
			$userInfo = User::find()->where(['id' => $id])->one();
			$userInfo->status = 0;
			if($userInfo->save()){
				return json_encode(['status' => 1,'msg'=> "禁用成功"]);
			}
		}


	}
	public function actionQiyong()
	{
		if (\Yii::$app->request->isAjax){
			$id = \Yii::$app->request->post('id');
			$userInfo = User::find()->where(['id' => $id])->one();
			$userInfo->status = 1;
			if($userInfo->save()){
				return json_encode(['status' => 1,'msg'=> "启用成功"]);
			}
		}


	}


}