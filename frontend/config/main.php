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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/gkpsinfo',
    // 'request' => [
    //     'baseUrl' => '/gkpsinfo',
    // ],    
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],  
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mx1.idhostinger.com',
                'username' => 'admin@gkpsinfo.or.id',
                'password' => 'Matius 28:19-20',
                'port' => '587',
                'encryption' => 'tls',
            ],            
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
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'class' => 'yii\web\UrlManager',
            'hostInfo' => '/frontend',
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',            
            ],
        ],
        'urlManagerBackend' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'class' => 'yii\web\UrlManager',
            'hostInfo' => '/backend',
            'baseUrl' => '/backend/web',
            'rules' => [
    
            ],
        ],
        
    ],
    'modules' => [
        'user' => [
            // following line will restrict access to admin controller from frontend application
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
        ],
    ],    
    'params' => $params,
];
