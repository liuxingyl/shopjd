<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/30
 * Time: 20:10
 */

namespace common\models;
use common\services\UtilService;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public static function tableName()
	{
		return "{{%user}}";
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
			['username','required','on' => ['login']],
			['useremail','email','on' => ['create']],
			['password','required','on' => ['login']],

		];
	}

	public function getProfile(){
		return $this->hasOne(Profile::className(),['userid' => 'id']);
	}

	/**创建帐户
	 * @param $useremail
	 *
	 * @return int
	 * Created by 流星liuxingl.
	 * Date: 2018/7/1
	 * Time: 9:06
	 */
	public function create($post){
		$this->scenario = 'create';
		$this->load($post,'');
		//var_dump($this->validate());die;
		if (!$this->validate()){
			return $this->errors;
		}
		try {
			$trans = \Yii::$app->db->beginTransaction();
			$username = $this->createName();
			$password = $this->createPass();
			$user = new User();
			$user->username = $username;
			$user->password = md5($password);
			$user->useremail = $post['useremail'];
			if (!$user->save()) {
				throw new \Exception();
			}
			$user = User::find()->where('username = :username',[':username' => $username])->one();
			$userid = $user->id;
			$profile = new Profile();
			$profile->userid = $userid;
			if (!$profile->save()) {
				throw new \Exception();
			}
			$mailer = \Yii::$app->mailer->compose('create', ['username' => $username, 'password' => $password
			]);
			$mailer->setFrom(['15028599182@163.com'=>'admin'])
				->setTo($post['useremail'])
				->setSubject("JD商城-创建账号");
			$re = $mailer->queue();

			if (!$re) {
				throw new \Exception();
			}
			$trans->commit();
			return 1;
		}catch(\Exception $e) {
			if (\Yii::$app->db->getTransaction()) {
				$trans->rollback();
			}
		}



	}
	public function getUser(){
		return self::find()->where('username = :e and password = :p',[
			':e' => $this->username,
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
		if (!$this->getUser()){
			return 0;
		}
		if(\Yii::$app->user->login($this->getUser(),0)){
			$data['lastlogintime'] = time();
			$data['lastloginip'] = ip2long(UtilService::getIP());
			self::updateAll($data,['id' => \Yii::$app->user->id]);
			return \Yii::$app->user->login($this->getUser(),0);
		}
		//var_dump($password);die;
//		$user = self::find()->where('useremail = :u and password = :p',[":u" =>$post['useremail'],":p" => md5($post['password'])])->one();
//		//var_dump($user);die;
//		if (!$user){
//			return 0;
//		}
//		$session = \Yii::$app->session;
//		//$session_set_cookie_params(760000);
//		$session['user'] = [
//			'useremail' => $user->useremail,
//			'img' => $user->img,
//			'isLogin' => 1,
//			'id' => $user->id,
//		];


	}
	public function createName(){
		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for($i=0;$i<5;$i++)
        {
            $key .= $pattern{mt_rand(0,35)};    //生成php随机数
        }
        return $key;
	}
	public function createPass(){
		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		for($i=0;$i<10;$i++)
		{
			$key .= $pattern{mt_rand(0,35)};    //生成php随机数
		}
		return $key;
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