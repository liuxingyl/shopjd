<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property string $username 名称
 * @property string $password 密码
 * @property string $useremail 邮箱
 * @property int $phone 手机号
 * @property string $img
 * @property string $create_time
 * @property string $update_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['phone', 'create_time', 'update_time'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 32],
            [['useremail'], 'string', 'max' => 30],
            [['img'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['phone'], 'unique'],
            [['useremail'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'useremail' => 'Useremail',
            'phone' => 'Phone',
            'img' => 'Img',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }


}
