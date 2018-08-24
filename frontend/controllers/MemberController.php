<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/25
 * Time: 22:51
 */

namespace frontend\controllers;

use common\models\UploadForm;
use yii\web\Response;
use common\models\User;
use yii\web\Controller;
use yii\web\UploadedFile;

class MemberController extends BaseController
{
	protected $only = ['logout','edit'];
    public function actionAuth(){
		$this->layout = "index1";
        return $this->render('auth');
    }

	/**创建会员账户
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 22:29
	 */
	public function actionCreate(){
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($email);die;
			$model = new User();
			$re = $model->create($post);
			//var_dump($re);die;
			if($re == 1){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "邮件发送并注册成功！"];
			}else if ($re == 0){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 0,'msg'=> "操作失败！"];

			}else if(!empty($re['useremail'])){
				//var_dump($model->login($post));die;
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 3,'msg'=> $re['useremail'][0]];
			}
		}
	}

	/**login
	 * @return array
	 * Created by 流星liuxingl.
	 * Date: 2018/7/1
	 * Time: 13:22
	 */
	public function actionLogin(){
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$model = new User();
			$re = $model->login($post);
			if($re == 1){

				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "登录成功！"];
			}else if ($re == 0){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 0,'msg'=> "用户名或者密码错误！"];

			}else if(!empty($re['useremail'])){
				//var_dump($model->login($post));die;
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 3,'msg'=> $re['useremail'][0]];
			}
		}
	}
	public function actionLogout(){
//		\Yii::$app->session->removeAll();
//		//var_dump(\Yii::$app->session['admin']['isLogin']);die;
//		if (!isset(\Yii::$app->session['user']['isLogin'])){
//
//			return $this->redirect("http://shopjd.com");
//		}
		\Yii::$app->user->logout(false);
		return $this->redirect(['index/index']);
	}

	/**
	 * huiyuan xinxi xiugai
	 * Created by 流星liuxingl.
	 * Date: 2018/7/8
	 * Time: 13:01
	 */
	public function actionEdit(){

		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$model = new UploadForm();
			//var_dump(UploadedFile::getInstance($model, 'img'));die;
			$model = new UploadForm();
			$model->imageFile = UploadedFile::getInstance($model, 'img');
			var_dump($model->upload());die;
			if ($model->upload()) {
				// 文件上传成功
				return "上传成功";
			}

		}
		$this->layout = "index1";
		return $this->render('edit');
	}
}