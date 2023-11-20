<?php
$dsn = env('DSN');
$username = env('DB_USER');
$password = env('DB_PASSWORD');
return [
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => $dsn,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@common/mail',
        ],
    ],
];
