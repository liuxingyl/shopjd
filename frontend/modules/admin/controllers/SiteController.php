<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\modules\admin\models\Admin;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','seekpassword','mailchangepass','mailchangepass','lst'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logoutController' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

	public function actionIndex()
	{
		return $this->render("Index");
	}

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = false;
        $model = new Admin();

        if (Yii::$app->request->isAjax){
            $post = Yii::$app->request->post();
            //var_dump($model->login($post));die;

            //var_dump($model->login($post)['password']);die;
            if($model->login($post) == 1){
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ['status' => 1,'msg'=> "登录成功"];
            }else if ($model->login($post) == 0){
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ['status' => 0,'msg'=> "用户名或者密码错误"];

            }else if(!empty($model->login($post)['name'])){
                //var_dump($model->login($post));die;
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ['status' => 2,'msg'=> $model->login($post)['name'][0]];
            }else if(!empty($model->login($post)['password'])){
                //var_dump($model->login($post));die;
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ['status' => 3,'msg'=> "密码不能为空！"];
            }
        }
        return $this->render("login",['model' => $model,]);
    }

	/** 找回密码
	 * @return Response
	 * Created by 流星liuxingl.
	 * Date: 2018/6/27
	 * Time: 17:48
	 */
	public function actionSeekpassword()
	{
		if (Yii::$app->request->isAjax){
			$post = Yii::$app->request->post();
			$model = new Admin();
			//var_dump($post);die;

			//var_dump($model->seekpassword($post));die;
			if($model->seekpassword($post) == 1){
				Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "邮件发送成功！"];
			}else if ($model->seekpassword($post) == 0){
				Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 0,'msg'=> "用户名或者邮箱错误"];

			}else if(!empty($model->seekpassword($post)['name'])){
				//var_dump($model->login($post));die;
				Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 2,'msg'=> $model->seekpassword($post)['name'][0]];
			}else if(!empty($model->seekpassword($post)['email'])){
				//var_dump($model->login($post));die;
				Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 3,'msg'=> $model->seekpassword($post)['email'][0]];
			}
		}
		return $this->renderPartial('seekpassword');

	}

	/**
	 * 修改密码
	 * @return array|string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/29
	 * Time: 18:33
	 */
	public function actionMailchangepass(){
		if (\Yii::$app->request->isGet){
			$get = \Yii::$app->request->get();

			$timestamp = $get['timestamp'];
			$adminuser = $get['adminuser'];
			$token = $get['token'];
			$model = new Admin();
			$myToken = $model->createToken($adminuser,$timestamp);
			//var_dump($token.'---');
			//var_dump($myToken);
			//die;
			if ($token != $myToken){
				$html = '<div class="alert alert-danger alert-dismissable">签名错误！</div>';
				echo $html;
				return $this->renderPartial('login');
				//$this->redirect(['site/login']);
				//$this->actionError("签名错误！","site/login","2");
			}elseif (time()-$timestamp > 300){
				$html = '<div class="alert alert-danger alert-dismissable">时间过期！</div>';
				echo $html;
				return $this->renderPartial('login');
				//$this->redirect(['site/login']);
			}else{
				$session = \Yii::$app->session;
				//$session_set_cookie_params(760000);
				$session['admin'] = ['adminuser' => $adminuser];
				return $this->renderPartial('Mailchangepass');
			}

		}

		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			$model = new Admin();
			$session = \Yii::$app->session;
			$adminuser = $session['admin']['adminuser'];
			//var_dump($session['admin']);die;
			$result =  $model->changepass($post,$adminuser);
			//var_dump($model->changepass($post)['password']);die;
			if($result == 1){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "密码修改成功！"];
			}else if ($result == 0){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 0,'msg'=> "两次输入密码不相同"];

			}else if(!$result['password'])

			{
				//var_dump($model->login($post));die;
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 2,'msg'=> $result['password'][0]];
			}

		}

	}


}
