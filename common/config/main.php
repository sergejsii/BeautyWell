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
                    'search/<q:\w+>' => 'search/index'

            ],
        ],
         'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@frontend/themes/globo/user'
                 ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'common\models\User',
                'Profile' => 'common\models\Profile',
                'RegistrationForm' => 'common\models\RegistrationForm',
            ],
        ],
    ],
];
