<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 13:06
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\AuthItem;
use app\modules\admin\models\Rbac;
use backend\models\Admin;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class RbacController extends BaseController
{
	/**
	 * 创建角色
	 * @return string
	 * Created by 流星liuxingl.
	 * Date: 2018/7/10
	 * Time: 20:55
	 */
    public function actionCreaterole()
    {
    	if (\Yii::$app->request->isAjax){
    		$auth = \Yii::$app->authManager;;
    		$role = $auth->createRole(null);
    		$post = \Yii::$app->request->post();
    		if (empty($post['name'])){
    			throw new \Exception('参数错误');
		    }
		    $role->name = $post['name'];
    		$role->description = empty($post['description']) ? null : $post['description'];
		    $role->type = 1;

		    if ($auth->add($role)){
			    \Yii::$app->response->format=Response::FORMAT_JSON;
			    return ['status' => 1,'msg'=> "添加角色成功！"];
		    }
	    }
        $this->layout = 'iframe';
        return $this->render('createrole');
    }

	/**
	 * 角色列表
	 * Created by 流星liuxingl.
	 * Date: 2018/7/10
	 * Time: 23:03
	 */
    public function actionLst(){
	    $roles = AuthItem::find();
		//var_dump($roles);die;


	    $count = AuthItem::find()
		    ->where(['type' => 1])->count();

	    $pagination = new Pagination([
		    'totalCount' => $count,
		    'pageSize' => 5,

	    ]);

	    $roles = $roles->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->where(['type' => 1])
		    ->select(['name', 'description'])
		    ->all();
	    //var_dump($admin);die;
	    $this->layout = 'iframe';
	    return $this->render('lst',[
		    'roles' => $roles,
		    'pagination' =>$pagination,
		    'count' => $count,
	    ]);
    }
	/**
	 * 权限列表
	 * Created by 流星liuxingl.
	 * Date: 2018/7/10
	 * Time: 23:03
	 */
	public function actionPermissionlst(){
		$role = AuthItem::find();
		//var_dump($roles);die;


		$count = AuthItem::find()
			->where(['type' => 2])->count();

		$pagination = new Pagination([
			'totalCount' => $count,
			'pageSize' => 10,

		]);

		$roles = $role->offset($pagination->offset)
			->limit($pagination->limit)
			->where(['type' => 2])
			->select(['name', 'description'])
			->all();
		//var_dump($count);die;
		$this->layout = 'iframe';
		return $this->render('permissionlst',[
			'roles' => $roles,
			'pagination' =>$pagination,
			'count' => $count,
		]);
	}
	public function actionAssignitem($name){
		if (\Yii::$app->request->isGet){
			$name = \Yii::$app->request->get('name');
			$name = htmlspecialchars($name);
			$auth = \Yii::$app->authManager;
			$parent = $auth->getRole($name);
			//var_dump($parent);die;
			$roles = Rbac::getOptions($auth->getRoles(),$parent);
			$permissions = Rbac::getOptions($auth->getPermissions(),$parent);
			$permissions1 = array();
			$permissions2 = array();
			foreach ($permissions as $k => $p){
				$str = substr($k,-1);
				if ($str == "*"){
					$permissions1[$k] = [];
					$permissions2[$k] = [];
				}
			}
			//var_dump($permissions);die;
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
			$children = Rbac::getChildrenByName($name);
			//var_dump($children);die;

			$this->layout = 'alert';
			return $this->render('assignitem',[
				'name' => $name,
				//'roles' => $roles,
				'permissions' => $permissions,
				'permissions2' => $permissions2,
				'children'=> $children
			]);
		}


		if (\Yii::$app->request->isAjax){
			$post = \Yii::$app->request->post('datas');
			$datas = json_decode($post,true);
			$children = !empty($datas) ? $datas : [];
			//
			$name = \Yii::$app->request->get('name');
			//var_dump($children,$name);die;
			$re = Rbac::addChild($children,$name);
			if (!$re){
				return json_encode(['status' => 0,'msg' =>  "分配权限失败！"]);
			}

			return json_encode(['status' => 1,'msg' =>  "分配权限成功！"]);

		}

	}
	public function actionEditpremission(){
		if (\Yii::$app->request->isGet){
			$name = \Yii::$app->request->get('name');
			$description = AuthItem::find()
				->where(['name' => $name])
				->one();
			$description = $description->description;
			//var_dump($name);die;
			$this->layout = 'alert';
			return $this->render('editpremission',[
				'name' => $name,
				'description' => $description,
			]);
		}
		if (\Yii::$app->request->isAjax){
			$name = \Yii::$app->request->post('name');
			$description = \Yii::$app->request->post('description');
			$role = AuthItem::find()
				->where(['name' => $name])
				->one();
			$role->description = $description;
			if ($role->save()){
				return json_encode(['status' => 1,'msg' => '修改成功']);
			}
		}
	}



}