<?php

return [


    'fetch'      => PDO::FETCH_CLASS,

    'default'    => 'mysql',


    'migrations' => 'migrations',


    'redis'      => [

        'cluster' => false,

        'default' => ['host'     => '127.0.0.1', 'port' => 6379,
                           'database' => 0],

    ],

];
