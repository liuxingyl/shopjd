<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cate_brand}}".
 *
 * @property int $id
 * @property int $cateid
 * @property int $brandid
 */
class CateBrand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cate_brand}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cateid', 'brandid'], 'integer'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cateid' => 'Cateid',
            'brandid' => 'Brandid',
        ];
    }
	public function getSoncate(){
		return $this->hasone(Soncate::className(),['id' => 'cateid'])->select(['id','title','cateid']);
	}
}
