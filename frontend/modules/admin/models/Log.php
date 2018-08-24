<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property string $id
 * @property string $app_name app 名字
 * @property string $err_name
 * @property int $http_code
 * @property int $err_code
 * @property string $ip
 * @property string $ua
 * @property string $content 日志内容
 * @property string $create_time
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['http_code', 'err_code', 'create_time'], 'integer'],
            [['ip', 'ua', 'content'], 'required'],
            [['content'], 'string'],
            [['app_name'], 'string', 'max' => 30],
            [['err_name'], 'string', 'max' => 50],
            [['ip'], 'string', 'max' => 20],
            [['ua'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_name' => 'App Name',
            'err_name' => 'Err Name',
            'http_code' => 'Http Code',
            'err_code' => 'Err Code',
            'ip' => 'Ip',
            'ua' => 'Ua',
            'content' => 'Content',
            'create_time' => 'Create Time',
        ];
    }
}
