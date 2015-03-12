<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' =>[
                    'profile/<q:\w+>' => 'profile/index', // z.B. profile/firma
//                  'search/<q:\w+>' => 'search/index',     //search/kosmetik

            ],
        ],
         'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@frontend/themes/globo/user'
                 ],
            ],
        ],
//        'authManager' => [
//            'class' => 'yii\rbac\DbManager',
//        ]
    ],

    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'common\models\User',
                'Profile' => 'common\models\Profile',
                'RegistrationForm' => 'common\models\RegistrationForm',
                'RegistrationForm' => 'common\models\RegistrationForm',

            ],
        ],

    ],
];
