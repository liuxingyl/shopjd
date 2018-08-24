<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 20:10
 */

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Address extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return "{{%address}}";
	}
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'attributes' => [
					# 创建之前
					ActiveRecord::EVENT_BEFORE_INSERT => ['create_time'],
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

		];
	}




}