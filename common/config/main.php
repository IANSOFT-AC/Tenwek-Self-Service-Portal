<?php
 //use kartik\mpdf\Pdf;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'TENWEK Self Service Portal',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat' => 'MM / dd / yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'KES',
       ],
         
       'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'useFileTransport' => false,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'encryption' => 'tls',
            'host' => 'smtp.gmail.com',
            'port' => '587',
            'username' => 'jimkinyua25@gmail.com',
            'password' => 'fzbgxqwixwxzmtwc',
        ], 
    ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:server=NavisionSql;database=Tenwek', //KEKLF-SQL55\POWERPIVOT - KEMRI_HRMIS_UAT  --live: 172.16.12.73
            'username' => 'SelfServicePortal', //'ess',
            'password' => 'TenwekPortal@2021', //'ess123',
            'charset' => 'utf8',
        ],
        'nav' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:server=NavisionSql;database=Tenwek', //172.16.12.185
            'username' => 'SelfServicePortal',
            'password' => 'TenwekPortal@2021',
            'charset' => 'utf8',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => ['/plugins/jquery/jquery.js'],
                ]
            ],
            'appendTimestamp' => true,
        ],
        'navision' => [
            'class' => 'common\Library\Navision',
        ],
        'navhelper' => [
            'class' => 'common\Library\Navhelper',
        ],
        'fms' => [
            'class' => 'common\Library\FMShelper',
        ],
        'recruitment' => [
            'class' => 'common\Library\Recruitment'
        ],
        'dashboard' => [
            'class' => 'common\Library\Dashboard'
        ],
        
    ],

];
