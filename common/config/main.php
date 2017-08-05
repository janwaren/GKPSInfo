<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name'=>'GKPSInfo.net',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],             
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => true,
            'mailer' => [
                // 'sender'                => 'no-reply@gkpsinfo.or.id', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Selamat datang di GKPSInfo!',
                'confirmationSubject'   => 'Konfirmasi Pendaftaran di GKPSInfo',
                'reconfirmationSubject' => 'Konfirmasi Ulang Pendaftaran',
                'recoverySubject'       => 'Recovery Password',
            ],            
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],     
];
