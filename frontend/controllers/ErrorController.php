<?php

namespace frontend\controllers;

use Yii;
use common\services\applog\ApplogService;
use frontend\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\log\FileTarget;
/**
 * UserController implements the CRUD actions for User model.
 */
class ErrorController extends Controller
{

    public function actionError()
    {
	    $error = \Yii:: $app->errorHandler->exception;
		
		if ($error) {
			$code = $error->getCode();
			$msg = $error->getMessage();
			$file = $error->getFile();
			$line = $error->getLine();

			$time = microtime(true);
			$log = new FileTarget();
			$log->logFile = Yii::$app->getRuntimePath() . '/logs/err.log';

			$err_msg = $msg . " [file: {$file}][line: {$line}][err code:$code.]".
			 	"[post:".http_build_query($_POST)."]";
			//$err_msg = 	'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
			$log->messages[] = [
				$err_msg,
				1,
				'application',
				$time
			];
			$log->export();
			ApplogService::addErrorLog(Yii::$app->id,$err_msg);
			//return "错误页面,错误信息：" . $err_msg;
			return $this->renderPartial('400',[
				'err_msg' => $err_msg,
			]);
		}
		
	    

    }

}
