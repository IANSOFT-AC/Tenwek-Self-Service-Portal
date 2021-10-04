<?php
 //use kartik\mpdf\Pdf;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'TENWEK Self Service Portal',
    // 'recruitmentPortal' => 'TENWEK Recruitment Portal',

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
                'encryption' => env('emailencryption'),
                'host' => env('smtpserver'),
                'port' => env('port'),
                'username' => env('emailusername'),
                'password' => env('emailpassword'),
            ], 
        ],

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:Server='.env('DB_SERVER').';Database='.env('DatabaseName'), 
            'username' => env('DB_USER'), 
            'password' => env('DB_PASSWORD'), 
            'charset' => 'utf8',
        ],
        'nav' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:Server='.env('DB_SERVER').';Database='.env('DatabaseName'), 
            'username' => env('DB_USER'), 
            'password' => env('DB_PASSWORD'), 
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
