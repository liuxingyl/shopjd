<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/7/11
 * Time: 19:15
 */

namespace console\controllers;


use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$trans = \Yii::$app->db->beginTransaction();
		try{
			$dir = dirname(dirname(dirname(__FILE__))) . '/frontend/modules/admin/controllers';
			$controllers = glob($dir . '/*');
			$permissions = [];

			foreach ($controllers as $c){
				$content = file_get_contents($c);
				preg_match('/class ([a-zA-Z]+)Controller/', $content,$match);
				$cName = $match[1];
				$permissions[] = strtolower($cName.'/*');
				preg_match_all('/public function action([a-zA-Z_]+)/',$content,$matches);
				foreach ($matches[1] as $aName){
					$permissions[] = strtolower($cName . '/' . $aName);
				}
			}
			//var_dump($permissions);
			$auth = \Yii::$app->authManager;
			foreach ($permissions as $p){
				if (!$auth->getPermission($p)){
					$obj = $auth->createPermission($p);
					$obj->description = $p;
					$auth->add($obj);
				}
			}
			$trans->commit();
			echo "import success!";
		}catch (\Exception $e){
			$trans->rollBack();
			echo "import failed!";
		}

	}
}