<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%brand}}".
 *
 * @property string $id
 * @property string $title
 * @property string $logo
 * @property string $create_time
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%brand}}';
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
            [['create_time'], 'integer'],
            [['title'], 'string', 'max' => 32],
            [['logo'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'logo' => 'Logo',
            'create_time' => 'Create Time',
        ];
    }
	public function getCateBrand(){
		return $this->hasMany(CateBrand::className(),['brandid' => 'id'])->joinWith('soncate');
	}
}
