<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 15:17
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;

class LogoutController extends Controller
{
	/**
	 * Logout action.
	 *
	 * @return string
	 */
	public function actionLogout()
	{
		\Yii::$app->admin->logout(false);
		return $this->redirect(['site/login']);


	}

}