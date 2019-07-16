<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'AdvertProject',
    'modules' => [
        'gii2' => [
            'class' => 'yii\gii\Module',
            'generators' => [
                'mongoDbModel' => [
                    'class' => 'yii\mongodb\gii\model\Generator'
                ]
            ],
        ],
    ],
    'components' => [
        'mongodb' => [
            'class' => 'yii\mongodb\Connection',
            'dsn' => 'mongodb://user2:1234567@localhost:27017/mydatabase',
        ],
        'cache' => [
            'class' => 'yii\mongodb\Cache',
        ],
        'session' => [
            'class' => 'yii\mongodb\Session',
        ],

        // ЧПУ
        'urlManager'=> [
            'class'=> 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'main/default',
                'blog' => 'main/blog',
                // путь по которому будет открываться => модуль контроллер экшин
                'blog/<page:\d+>/<per-page\d+>' => 'main/blog/index',
                'blog/<id:\w+>' => 'main/blog/view',
                '<action:(register|contact|login|logout|about)>' => 'main/default/<action>',
                /*
                'pages/<view:[a-zA-Z0-9-]+>' => 'main/main/page',
                'view-advert/<id:\d+>' => 'main/main/view-advert',
                'cabinet/<action_cabinet:(settings|password-change)>' => 'cabinet/default/<action_cabinet>',
                'cabinet/advert/view/<id:\d+>' => 'cabinet/advert/view',
                'cabinet/advert/update/<id:\d+>' => 'cabinet/advert/update',
                'cabinet/advert/delete/<id:\d+>' => 'cabinet/advert/delete', */
            ]
        ],
    ],
];


