<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 13:06
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Rbac;
use app\modules\admin\models\Admin;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class AdminController extends BaseController
{

    public function actionChangeinfo()
    {
        $this->layout = false;
        $model = Admin::find()->where('username = user',[':user' => \Yii::$app->session['admin']['username']])->one();
        return $this->render('Changeinfo',['model' => $model,]);
    }

    public function actionChangeimg()
    {
        $this->layout = false;
        //$model = Admin::find()->where('username = user',[':user' => \Yii::$app->session['admin']['username']])->one();
        return $this->render('Changeimg');
    }
    public function actionLst()
    {
        $this->layout = 'iframe';

        //var_dump($admins);die;

        $admin = Admin::find();
        $count = $admin->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 10,

            ]);

        $admins = $admin->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        //var_dump($admin);die;
        return $this->render('lst',[
            'admins' => $admins,
            'pagination' =>$pagination,
            'count' => $count,
        ]);
    }

	/**添加管理员
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 12:54
	 */
	public function actionAdd()
	{
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			//var_dump($post);die;
			if ($post['pass'] != $post['repass']){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 0,'msg'=> "两次输入密码不相同"];
			}

			$model = new Admin();
			$model->name = $post['username'];
			$model->email = $post['email'];
			$model->phone = $post['phone'];
			$model->password = md5($post['pass']);
			if ($model->save()){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "添加管理员成功！"];
			}

		}
		$this->layout = "alert";
		return $this->render('Add');

	}

	/**编辑管理员
	 * @return array|string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 16:36
	 */
	public function actionEdit()
	{
		if (\Yii::$app->request->isGet) {

			$id = \Yii::$app->request->get('id');
			$admin = Admin::find()->where(['id' => $id])->one();
		}
		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post();
			if ($post['pass'] != $post['repass']){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 0,'msg'=> "两次输入密码不相同"];
			}
			//var_dump($post);die;
			$id = $post['id'];
			$model = Admin::find()->where(['id' => $id])->one();
			$model->name = $post['name'];
			$model->email = $post['email'];
			$model->phone = $post['phone'];
			$model->password = md5($post['pass']);
			if ($model->save()){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "修改管理员成功！"];
			}

		}
		$this->layout = "alert";
		return $this->render('Edit',[
			'admin' => $admin,
			]);

	}

	/**删除管理员
	 * @return array|string
	 * Created by 流星liuxingl.
	 * Date: 2018/6/30
	 * Time: 20:55
	 */
	public function actionDel()
	{
		if (\Yii::$app->request->isAjax){
			$id = \Yii::$app->request->post('id');
			$admin = Admin::find()->where(['=','id' , $id])->all();
			//var_dump($admin);die;

			if ($admin[0]->delete()){
				\Yii::$app->response->format=Response::FORMAT_JSON;
				return ['status' => 1,'msg'=> "删除管理员成功！"];
			}

		}
	}

	/**
	 * 授权
	 * Created by 流星liuxingl.
	 * Date: 2018/7/12
	 * Time: 18:59
	 */
    public function actionAssign($adminid){
		$admin = Admin::findOne($adminid);
		$auth = \Yii::$app->authManager;
		if (empty($admin)){
			throw new \yii\web\NotFoundHttpException('admin not fund');
		}
		$roles = Rbac::getOptions($auth->getRoles(),null);
		//$permissions = Rbac::getOptions($auth->getPermissions(),null);
	    $roles = $auth->getRoles();
	    $permissions = $auth->getPermissions();
	    $permissions = ArrayHelper::toArray($permissions);
	    //var_dump($permissions);die;
	    foreach ($permissions as $k => $v){
		    $permissions[$k] = $v['description'];
	    }
	    //$permissions = array_keys($permissions);
	    //var_dump($permissions);die;
	    $permissions1 = array();
	    $permissions2 = array();
	    foreach ($permissions as $k => $p){
		    $str = substr($k,-1);
		    if ($str == "*"){
			    $permissions1[$k] = [];
			    $permissions2[$k] = [];
		    }
	    }

	    foreach ($permissions1 as $k => $v){
		    foreach ($permissions as $k1 => $p){
			    $str = substr($k1,0,4);
			    $str1 = substr($k,0,4);
			    if ($str == $str1){
				    $permissions1[$k][] = $k1;
				    //$permissions2[$k]['name'] = $k1;
				    //$permissions2[$k][$k1] = $p;
				    if (substr($k1,-1) == "*"){
					    $permissions2[$k][0] = $p;
				    }else {
					    $permissions2[$k][$k1] = $p;
				    }
			    }

		    }
	    }
	    $children = Rbac::getChildrenByUser($adminid);
	    //var_dump($children);die;
	    if (\Yii::$app->request->isAjax){
	    	$post = \Yii::$app->request->post('datas');
		    $children = json_decode($post,true);


	    	$children = !empty($children) ? $children : [];
	    	$adminid = (int)$adminid;
		    //var_dump($adminid);die;
	    	//$a = \Yii::$app->authManager->getRole("普通管理员");
	    	//var_dump($a);die;
		    //var_dump($adminid,$children);die;
		    if (Rbac::grant($adminid,$children)){
			    return json_encode(['status' => 1,'msg'=> "授权成功！"]);
		    }
	    }
	   //var_dump($roles);die;
	    $this->layout = 'iframe';
		return $this->render('assign', [
			'roles' => $roles,
			'permissions2' => $permissions2,
			'admin'=> $admin,
			'children'=> $children,
			]);

    }


}