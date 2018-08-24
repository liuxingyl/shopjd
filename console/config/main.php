<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
	'aliases' => [
		'@liangzhaoxuan/mailerqueue' => '@vendor/liangzhaoxuan/yii2-mailerqueue'
	],

    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
	    'authManager' => [
		    'class' => 'yii\rbac\DbManager',  //数据库方式
		    //auth_item( role  permission)
		    //auth_item_child()
		    'itemTable' => '{{%auth_item}}',
		    'itemChildTable' => '{{%auth_item_child}}',
		    'assignmentTable' => '{{%auth_assignment}}',
		    'ruleTable' => '{{%auth_rule}}',
	    ],

	    'redis' => [
		    'class' => 'yii\redis\Connection',
		    'hostname' => 'localhost',
		    'port' => 6379,
		    'database' => 0,
	    ],
	    'mailer' => [
		    'class' => 'liangzhaoxuan\mailerqueue\MailerQueue',
		    'db' => '1',
		    'key' => 'mails',
		    //'class' => 'yii\swiftmailer\Mailer',

		    'viewPath' => '@common/mail',
		    // send all mails to a file by index. You have to set
		    // 'useFileTransport' to false and configure a transport
		    // for the mailer to send real emails.
		    //false：非测试状态，发送真实邮件而非存储为文件
		    'useFileTransport' => false,
		    'transport' => [
			    'class' => 'Swift_SmtpTransport',
			    'host' => 'smtp.163.com',
			    'username' => '15028599182@163.com',
			    'password' => '528599119961995L',
			    'port' => '465',
			    'encryption' => 'ssl',
		    ],
	    ],

    ],
    'params' => $params,
];
