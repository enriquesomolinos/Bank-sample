<?php
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'bank-oauth-adapter' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => 'sqlite:data/oauth2/bankdb.sqlite',
                        'route' => '/oauth',
                        'password' => 'test',
                    ],
                ],
                'http-basic-adapter' => [
                    'adapter' => \ZF\MvcAuth\Authentication\HttpAdapter::class,
                    'options' => [
                        'accept_schemes' => [
                            0 => 'basic',
                        ],
                        'realm' => 'API',
                        'htpasswd' => 'data/htpasswd',
                    ],
                ],
            ],
        ],
    ],
    'db' => [
        'adapters' => [
            'bank-database-adapter' => [
                'database' => 'bankCharges.sqlite',
                'driver' => 'PDO_Sqlite',
                'username' => 'test',
                'password' => 'test',
                'dsn' => 'sqlite:data/bankCharges.sqlite',
            ],
            'dummy' => [
                'database' => 'test',
                'driver' => 'IbmDb2',
                'password' => 'test',
                'dsn' => 'sqlite::memory:',
            ],
        ],
    ],
];
