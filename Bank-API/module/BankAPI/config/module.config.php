<?php
return [
    'display_exceptions' => true,
    'service_manager' => [
        'factories' => [
            \BankAPI\V1\Rest\Charge\ChargeResource::class => \BankAPI\V1\Rest\Charge\ChargeResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'bank-api.rest.charge' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/charge[/:charge_id]',
                    'defaults' => [
                        'controller' => 'BankAPI\\V1\\Rest\\Charge\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'bank-api.rest.charge',
        ],
    ],
    'zf-rest' => [
        'BankAPI\\V1\\Rest\\Charge\\Controller' => [
            'listener' => \BankAPI\V1\Rest\Charge\ChargeResource::class,
            'route_name' => 'bank-api.rest.charge',
            'route_identifier_name' => 'charge_id',
            'collection_name' => 'charge',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '5',
            'page_size_param' => null,
            'entity_class' => \BankAPI\V1\Rest\Charge\ChargeEntity::class,
            'collection_class' => \BankAPI\V1\Rest\Charge\ChargeCollection::class,
            'service_name' => 'charge',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'BankAPI\\V1\\Rest\\Charge\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'BankAPI\\V1\\Rest\\Charge\\Controller' => [
                0 => 'application/vnd.bank-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'BankAPI\\V1\\Rest\\Charge\\Controller' => [
                0 => 'application/vnd.bank-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \BankAPI\V1\Rest\Charge\ChargeEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'bank-api.rest.charge',
                'route_identifier_name' => 'charge_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \BankAPI\V1\Rest\Charge\ChargeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'bank-api.rest.charge',
                'route_identifier_name' => 'charge_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'BankAPI\\V1\\Rest\\Charge\\Controller' => [
            'input_filter' => 'BankAPI\\V1\\Rest\\Charge\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'BankAPI\\V1\\Rest\\Charge\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '1',
                            'message' => 'The charge description lenght is not correct',
                            'max' => '100',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'description',
                'description' => 'Bank charge description.',
                'field_type' => 'String',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\GreaterThan::class,
                        'options' => [
                            'min' => '0.00',
                            'message' => 'Amount needs to be greater than 0',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\I18n\Validator\IsFloat::class,
                        'options' => [
                            'message' => 'Amount needs to be a number',
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'amount',
                'description' => 'Amount of the bank charge',
                'field_type' => 'Float',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'BankAPI\\V1\\Rest\\Charge\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            \BankAPI\V1\Rest\Charge\ChargeResource::class => [
                'adapter_name' => 'bank-database-adapter',
                'table_name' => 'charge',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'BankAPI\\V1\\Rest\\Charge\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'BankAPI\\V1\\Rest\\Charge\\ChargeResource\\Table',
            ],
        ],
    ],
];
