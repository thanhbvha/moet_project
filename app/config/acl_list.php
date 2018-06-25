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
                    'getSpecialize'
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
            ],
            'errors' => [
                'description' => 'errors resource',
                'actions' => [
                    'index', 'error401', 'error404'
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
                    'errors' => [
                        'actions' => [
                            'index', 'error401', 'error404'
                        ]
                    ]
                ],
            ],
            'register' => [
                'description' => 'logged in register',
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
                ]
            ],
            'partner' => [
                'description' => 'logged in partner',
                'inherit' => 'register',
                'allow' => [
                    'topic' => [
                        'actions' => [
                            'index',
                            'form',
                            'export',
                            'getSpecialize'
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