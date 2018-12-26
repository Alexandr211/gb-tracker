<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
         //   'defaultRoles' => ['user','admin'], 
            'itemFile' => '@frontend/rbac/items.php',
            'assignmentFile' => '@frontend/rbac/assignments.php',
            'ruleFile' => '@frontend/rbac/rules.php'
        ],
    ],
];
