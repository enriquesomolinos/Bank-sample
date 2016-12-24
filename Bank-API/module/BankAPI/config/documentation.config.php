<?php
return [
    'BankAPI\\V1\\Rest\\Charge\\Controller' => [
        'description' => 'Bank charges service. This service allow to add and list bank charges.',
        'collection' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/charge"
       },
       "first": {
           "href": "/charge?page={page}"
       },
       "prev": {
           "href": "/charge?page={page}"
       },
       "next": {
           "href": "/charge?page={page}"
       },
       "last": {
           "href": "/charge?page={page}"
       }
   }
   "_embedded": {
       "charge": [
           {
               "_links": {
                   "self": {
                       "href": "/charge[/:charge_id]"
                   }
               }
              "description": "Bank charge description.",
              "amount": "Amount of the bank charge"
           }
       ]
   }
}',
                'description' => 'This operation list all user charges',
            ],
            'description' => 'Contain all user charges',
            'POST' => [
                'description' => 'This operation creates a new charge',
                'request' => '{
   "description": "Bank charge description.",
   "amount": "Amount of the bank charge"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/charge[/:charge_id]"
       }
   }
   "description": "Bank charge description.",
   "amount": "Amount of the bank charge"
}',
            ],
        ],
        'entity' => [
            'description' => 'Contains a user charge.',
            'PUT' => [
                'description' => 'Allow API client to insert new charges.',
                'response' => '{
   "_links": {
       "self": {
           "href": "/charge[/:charge_id]"
       }
   }
   "description": "Bank charge description.",
   "amount": "Amount of the bank charge"
}',
                'request' => '{
   "description": "Bank charge description.",
   "amount": "Amount of the bank charge"
}',
            ],
            'POST' => [
                'request' => '{
   "description": "Bank charge description.",
   "amount": "Amount of the bank charge"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/charge[/:charge_id]"
       }
   }
   "description": "Bank charge description.",
   "amount": "Amount of the bank charge"
}',
            ],
        ],
    ],
];
