<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 14:10
 */

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Admin;
use yii\web\Response;

class BaseController extends Controller
{
	public function beforeAction($action)
	{
		if (!parent::beforeAction($action)){
			return false;
		}
		$controller = $action->controller->id;
		$actionName = $action->id;
		if (\Yii::$app->admin->can($controller. '/*')){
			return true;
		}
		if (\Yii::$app->admin->can($controller. '/' . $actionName)){
			return true;
		}
		throw new \yii\web\UnauthorizedHttpException('对不起，您没有此权限！');
	}

	public function init()
	{
		parent::init();
		if (\Yii::$app->admin->isGuest) {
			return $this->redirect("http://shopjd.com/index.php?r=admin/site/login");
		}
	}

}