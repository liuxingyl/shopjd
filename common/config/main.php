<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'aliases' => [
		'@liangzhaoxuan/mailerqueue' => '@vendor/liangzhaoxuan/yii2-mailerqueue'
	],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
	        // 'class' => 'yii\redis\Cache',
	        // 'redis' => [
		       //  'hostname' => 'localhost',
		       //  'port' => 6379,
		       //  'database' => 2,
	        // ],
        ],


    ],
];
