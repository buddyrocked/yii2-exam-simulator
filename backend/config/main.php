<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'EXAM SIMULATOR',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            'enableRegistration' => true,
            'emailConfirmationRequired'=> true,
            'useEmailAsLogin'=>true,
            // Here you can set your handler to change layout for any controller or action
            // Tip: you can use this event in any module
            'on beforeAction'=>function(yii\base\ActionEvent $event) {
                if ( $event->action->uniqueId == 'user-management/auth/login' || $event->action->uniqueId == 'user-management/auth/registration' )
                {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
            'on afterRegistration' => function(webvimark\modules\UserManagement\components\UserAuthEvent $event) {
                \webvimark\modules\UserManagement\models\User::assignRole($event->user->id, 'User');
            },
            'registrationFormClass' => 'backend\models\RegistrationFormProfile',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],*/
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',
            // Comment this if you don't want to record user logins
            'on afterLogin' => function($event) {
                    \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
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
        'urlManager'=>[
            'enablePrettyUrl'=>true,
            'enableStrictParsing' => false,
            'showScriptName'=>false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'example'],               
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                                //'@dektrium/user/views' => '@backend/themes/budi-layout/user',
                                //'@app/views' => '@backend/themes/budilayout', //own template custom
                                '@vendor/webvimark/module-user-management/views' => '@backend/themes/adminLTE/webvimark/module-user-management/',
                                '@app/views' => '@backend/themes/adminLTE'
                            ],
                //'baseUrl' => '@backend/themes/budi-layout',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-red-light',
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'thousandSeparator' => ',',
            'decimalSeparator' => '.',
        ],
        'profile' => [
            'class'=>'backend\components\ProfileHelper',
        ],
        'thumbnail' => [
            'class' => 'himiklab\thumbnail\EasyThumbnail',
            'cacheAlias' => 'gallery_thumbnails',
        ],
        'bootstrap' => ['log', 'thumbnail'],
    ],
    'params' => $params,
];
