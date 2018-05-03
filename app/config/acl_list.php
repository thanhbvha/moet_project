<?php

use Phalcon\Acl;

return [
    'acl' => [
        'defaultAction' => Acl::DENY,
        'resource' => [ // setup controller - action
            'index' => [
                'description' => 'index resource',
                'actions' => [
                    'index'
                ],
            ],
            'login' => [
                'description' => 'login resource',
                'actions' => [
                    'index',
                    'google',
                    'ggoauth',
                    'logout'
                ],
            ],
            'topic' => [
                'description' => 'topic resource',
                'actions' => [
                    'index',
                    'form',
                    'export',
                ],
            ],
            'admin' => [
                'description' => 'admin resource',
                'actions' => [
                    'index',
                    'users',
                    'topic',
                    'units',
                    'unitsForm',
                    'fields',
                    'fieldsForm',
                    'specialize',
                    'specializeForm',
                    'logging'
                ],
            ]
        ],
        'role' => [ // setup role
            'guest' => [
                'description' => 'guest user',
                'allow' => [
                    'login' => [
                        'actions' => [
                            'index',
                            'google',
                            'ggoauth'
                        ],
                    ],
                ],
            ],
            'partner' => [
                'description' => 'logged in partner',
                'inherit' => 'guest',
                'allow' => [
                    'index' => [
                        'actions' => 'index',
                    ],
                    'login' => [
                        'actions' => [
                            'logout'
                        ],
                    ],
                    'topic' => [
                        'actions' => [
                            'index',
                            'form',
                            'export',
                        ],
                    ],
                ],
            ],
            'admin' => [
                'description' => 'logged in admin',
                'inherit' => 'partner',
                'allow' => [
                    'topic' => [
                        'actions' => [
                            'index',
                            'form',
                            'export',
                        ],
                    ],
                    'admin' => [
                        'actions' => [
                            'index',
                            'users',
                            'topic',
                            'units',
                            'unitsForm',
                            'fields',
                            'fieldsForm',
                            'specialize',
                            'specializeForm',
                            'logging'
                        ],
                    ],
                ],
            ]
        ],
    ]
];