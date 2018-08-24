<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 20:10
 */

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Profile extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return "{{%profile}}";
	}
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'attributes' => [
					# 创建之前
					ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
					# 修改之前
					ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time']
				],
				#设置默认值
				'value' => time()
			]
		];
	}
	public function rules(){
		return[
			['name','required','message' => '管理员账号不能为空！','on' => ['login','seekpassword']],
			['password','required','message' => '管理员密码不能为空！','on' => ['login',]],
			['email','required','message' => '管理员邮箱不能为空！','on' => ['seekpassword',]],
			['email','email','message' => '管理员邮箱格式不正确！','on' => ['seekpassword',]],

		];
	}
}