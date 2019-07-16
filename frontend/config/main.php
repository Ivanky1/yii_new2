<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'language' => 'ru-RU',
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main',
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module'
        ],
        'cabinet' => [
            'class' => 'app\modules\cabinet\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\mongo\Users',
            'enableAutoLogin' => true,
            'loginUrl' => '/login',
        ],
        'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.yandex.ru',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => 'test@ya.ru',
                'password'   => 'test',
            ],
        ],
        'common' => [
            'class' => 'frontend\components\Common',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'request'=>[
            'baseUrl'=>'',
        ],
    ],
    'params' => $params,
];
