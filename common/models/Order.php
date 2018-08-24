<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $id
 * @property string $cateid
 * @property string $title
 * @property string $desc
 * @property string $num
 * @property string $price
 * @property string $cover
 * @property string $pics
 * @property string $issale
 * @property string $ishot
 * @property string $istui
 * @property string $saleprice
 * @property string $ison
 * @property string $createtime
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
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
					//ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time']
				],
				#设置默认值
				'value' => time()
			]
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

	public function getOrderDetail(){
		return $this->hasMany(OrderDetail::className(),['orderid' => 'id']);
	}
	public function getUser(){
		return $this->hasOne(User::className(),['id' => 'userid']);
	}
}
