<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 14:10
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

class BaseController extends Controller
{
	protected $only = ['*'];
	protected $except = [];
	//protected $verbs = [];
	public function behaviors()
	{
		return [
			'access' => [
				'class' => \yii\filters\AccessControl::className(),
				'only' => $this->only,
				'except' => $this->except,
				'rules' =>[
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
//			'veribs' => [
//				'class' => \yii\filters\VerbFilter::className(),
//				'actions' => $this->verbs,
//			]
		];
	}

	public function init()
	{
		parent::init();
//		$redis = \Yii::$app->redis;
//		$redis->select(1);
//		if($redis->lrange('mails',0,-1)){
//			\Yii::$app->mailer->process();
//		}

	}

}