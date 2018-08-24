<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $id
 * @property string $title
 * @property string $pid
 * @property string $create_time
 * @property string $update_time
 */
class Soncate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%soncate}}';
    }

	/**
	 * auto writetime
	 * @return array
	 * Created by 流星liuxingl.
	 * Date: 2018/7/1
	 * Time: 19:29
	 */
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
	public function getCategory(){
    	return $this->hasOne(Category::className(),['id' => 'cateid']);
	}
	public function getCateBrand(){
		return $this->hasMany(CateBrand::className(),['cateid' => 'id']);
	}

}
