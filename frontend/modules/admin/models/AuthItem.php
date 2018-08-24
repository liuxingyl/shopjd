<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 22:06
 */
namespace app\modules\admin\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
class AuthItem extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "{{%auth_item}}";
    }


}