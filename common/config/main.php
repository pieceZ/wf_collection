<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=10.5.106.95;dbname=workflow',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];
