<?php
return [
    'UpdateAdmin' => [
        'type' => 2,
        'description' => 'UpdateAdmin',
    ],
    'UpdateTask' => [
        'type' => 2,
        'description' => 'UpdateTask',
        'ruleName' => 'isAuthor',
        'children' => [
            'UpdateAdmin',
        ],
    ],
    'UpdateProject' => [
        'type' => 2,
        'description' => 'UpdateProject',
        'ruleName' => 'isCreator',
        'children' => [
            'UpdateAdmin',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'UpdateAdmin',
        ],
    ],
    'author' => [
        'type' => 1,
        'children' => [
            'UpdateTask',
            'UpdateProject',
        ],
    ],
];
