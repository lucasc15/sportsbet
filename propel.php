<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'sportsbet' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=sportsbet',
                    'user'       => 'root',
                    'password'   => 'sportsbet',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'sportsbet',
            'connections' => ['sportsbet']
        ],
        'generator' => [
            'defaultConnection' => 'sportsbet',
            'connections' => ['sportsbet']
        ]
    ]
];
