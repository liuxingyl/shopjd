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
class Product extends \yii\db\ActiveRecord
{
	const AK = 'ORq9xvZLJ8OHH7BaizaHtRxia0ZBdWbDJ51gC3tS';
	const SK = 'iIXcuiv6TtU5vt_n4nGTU6rKWytyK3dHXhRAvsIe';
	const DOMAIN = 'pblk6j3hs.bkt.clouddn.com';
	const BUCKET = 'shangcheng';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
	    return [
		    [['cateid', 'brandid', 'num', 'featuredid', 'create_time', 'update_time'], 'integer'],
		    [['description', 'isnew', 'abstract', 'issale', 'ishot'], 'string'],
		    [['price', 'saleprice'], 'number'],
		    [['title', 'cover'],'string', 'max' => 200],
		    [['cover','title'], 'required','message' => '您还没有上传图片！'],
	    ];
    }


	public function getSoncate(){
		return $this->hasOne(Soncate::className(),['id' => 'cateid']);
	}
	public function getFeatured(){
		return $this->hasOne(Featured::className(),['id' => 'featuredid'])->select(['id','title']);
	}
	public function getBrand(){
		return $this->hasOne(Brand::className(),['id' => 'brandid']);
	}
}
