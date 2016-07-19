<?php
use kartik\mpdf\Pdf;



$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>[
            'class' => '\kartik\grid\Module',
        ],
    ],
    'components' => [
      // setup Krajee Pdf component
         'pdf' => [
             'class' => Pdf::classname(),
             'format' => Pdf::FORMAT_A4,
             'orientation' => Pdf::ORIENT_PORTRAIT,
             'destination' => Pdf::DEST_BROWSER,
             // refer settings section for all configuration options
         ],
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

    ],
    'params' => $params,
];
