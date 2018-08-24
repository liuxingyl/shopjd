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
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%history}}';
    }
	public function behaviors()
	{
		return [

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

	public function getProduct(){
		return $this->hasOne(Product::className(),['id' => 'productid']);
	}

}
