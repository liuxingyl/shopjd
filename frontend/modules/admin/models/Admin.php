<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 22:06
 */
namespace app\modules\admin\models;

use common\services\UtilService;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return "{{%admin}}";
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
    public function rules(){
        return[
            ['name','required','message' => '管理员账号不能为空！','on' => ['login','seekpassword']],
            ['password','required','message' => '管理员密码不能为空！','on' => ['login',]],
            ['email','required','message' => '管理员邮箱不能为空！','on' => ['seekpassword',]],
            ['email','email','message' => '管理员邮箱格式不正确！','on' => ['seekpassword',]],

        ];
    }


    /**
     * 找回密码
     * Created by 流星liuxingl.
     * Date: 2018/6/28
     * Time: 20:27
     */
    public function seekpassword($data){
        $this->scenario = 'seekpassword';
        $this->load($data,"");
        //var_dump($this->validate());die;
        if (!$this->validate()){
            return $this->errors;
        }
        // $model->find()->createCommand()->getRawSql();
        $admin = self::find()->where('name = :name and email = :email',[":name" => $data['name'],":email" => $data['email']])->one();
        //var_dump($admin->email);die;
        if (!is_null($admin)){
            //做点有意义的事
            $time = time();
            $token = $this->createToken($data['name'], $time);
            //var_dump($token);die;


            $mailer = \Yii::$app->mailer->compose('seekpassword', ['adminuser' => $data['name'], 'time' => $time, 'token' => $token]);
            $mailer->setFrom(['15028599182@163.com'=>'admin'])
            ->setTo($data['email'])
            ->setSubject("JD商城-找回密码")
            ->send();
           // var_dump();
            if ($mailer) {
                //var_dump($mailer);die;
                return 1;
            }
        }
    }
    public function createToken($name, $time)
    {
        return md5(md5($name).base64_encode(\Yii::$app->request->userIP).md5($time));
    }


    /**修改密码
     * @param $data
     * @return array|int
     * Created by 流星liuxingl.
     * Date: 2018/6/29
     * Time: 21:19
     */
    public function changepass($data,$adminuser){
        $this->load($data);

        //var_dump($adminuser);die;
        if (!$this->validate()){
            //var_dump($this->errors);die;
            return $this->errors;
        }
        if($data['password'] != $data['qrpass']){
            return 0;
        }
        $re = $this->updateAll(['password' => md5($data['password'])],['name' => $adminuser]);
        if($re){
            \Yii::$app->session->removeAll();
            return 1;
        }
    }

	public function getAdmin(){
		return self::find()->where('name = :n and password = :p',[
			':n' => $this->name,
			':p' => md5($this->password),
		])->one();
	}

	/**login
	 * @param $post
	 *
	 * @return array|int
	 * @throws \yii\db\Exception
	 * Created by 流星liuxingl.
	 * Date: 2018/7/1
	 * Time: 13:24
	 */
	public function login($post){
		$this->scenario = 'login';
		$this->load($post,'');
		//var_dump($this->getUser());die;
		if (!$this->validate()){
			return $this->errors;
		}
		if (!$this->getAdmin()){
			return 0;
		}
		if(\Yii::$app->admin->login($this->getAdmin(),0)){
			$data['lastlogintime'] = time();
			$data['lastloginip'] = ip2long(UtilService::getIP());
			self::updateAll($data,['id' => \Yii::$app->admin->id]);
			return 1;
		}

	}

	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}
	public function getId(){

		return $this->id;
	}
	public function getAuthKey(){
		return '';
	}
	public function validateAuthkey($authkey){
		return true;
	}


}