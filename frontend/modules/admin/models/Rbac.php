<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/7/11
 * Time: 20:18
 */

namespace app\modules\admin\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Rbac extends ActiveRecord
{
	public static function  getOptions($data,$parent){
		$return = [];
		foreach ($data as $obj) {
			if (!empty($parent) && $parent->name != $obj->name && \Yii::$app->authManager->canAddChild($parent, $obj)) {
				$return[$obj->name] = $obj->description;
			}
		}
		return $return;

	}
	public static function addChild($children,$name){
		$auth = \Yii::$app->authManager;
		$itemObj = $auth->getRole($name);
		if (empty($itemObj)){
			return false;
		}
		$trans = \Yii::$app->db->beginTransaction();
		try{
			$auth->removeChildren($itemObj);
			foreach ($children as $item){
				$obj = empty($auth->getRole($item)) ? $auth->getPermission($item) : $auth->getRole($item);
				$auth->addChild($itemObj,$obj);
			}
			$trans->commit();
			return true;
		}catch (\Exception $e){
			$trans->rollBack();
			return false;
		}
	}
	public static function getChildrenByName($name){
		if (empty($name)){
			return false;
		}
		$return = [];
		$auth = \Yii::$app->authManager;
		$children = $auth->getChildren($name);
		if (empty($children)){
			return [];
		}
		foreach ($children as $obj){
			if ($obj->type == 1){
				$return['roles'][] = $obj->name;
			}else{
				$return['permissions'][] = $obj->name;
			}

		}
		return $return;
	}
	private static function _getItemByUser($adminid,$type){
		$func = 'getPermissionsByUser';
		if ($type == 1){
			$func = 'getRolesByUser';
		}
		$data = [];
		$auth = \Yii::$app->authManager;
		$items = $auth->$func($adminid);
		// var_dump($items);die;
		foreach ($items as $item){
			$data[] = $item->name;
		}
		return $data;
	}

	public static function getChildrenByUser($adminid){
		$return = [];
		$return['roles'] = [];
		$return['permissions'] = self::_getItemByUser($adminid,2);
		$return['roles'] = self::_getItemByUser($adminid,1);

		return $return;
	}
	public static function grant($adminid,$children){
		$trans = \Yii::$app->db->beginTransaction();
		try{
			$auth = \Yii::$app->authManager;
			$auth->revokeAll($adminid);
			foreach ($children as $item){
				$obj = empty($auth->getRole($item)) ? $auth->getPermission($item) : $auth->getRole($item);
				$auth->assign($obj,$adminid);
			}
			$trans->commit();
		}catch (\Exception $e){
			$trans->rollBack();
			return false;
		}
		return true;
	}


}