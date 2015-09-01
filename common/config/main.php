<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@backend/web/uploads/editor',
            'uploadUrl' => '@web/uploads/editor',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
];
