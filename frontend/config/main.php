<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'seo'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'errorAction' => 'site/error',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                                '@app/views' => '@backend/themes/adminLTE'
                            ],
                //'baseUrl' => '@backend/themes/budi-layout',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules'=> [
                'home'=>'site/index',
                'services'=>'site/services',
                'partners'=>'site/partners',
                'products'=>'site/product',
                'trainings'=>'site/training',
                'contact'=>'site/contact',
                'login'=>'site/login'

            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.rialachas.com',
                'username' => 'budi.hariyana@rialachas.com',
                'password' => 'Rialachas123',
                'port' => '587',
                //'encryption' => 'STARTTLS',
            ],
        ],
        'seo' => [
            'class' => 'Amirax\SeoTools\Meta'
        ],
    ],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@frontend/web/uploads/editor',
            'uploadUrl' => '@web/uploads/editor',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
    'params' => $params,
];
