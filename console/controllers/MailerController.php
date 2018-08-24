<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/7/11
 * Time: 19:15
 */

namespace console\controllers;


use yii\console\Controller;

class MailerController extends Controller
{
	public function actionSend()
	{
		\Yii::$app->mailer->process();

	}
}