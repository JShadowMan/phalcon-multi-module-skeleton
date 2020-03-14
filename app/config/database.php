<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Adapter\Pdo\Postgresql;


return [
    'default' => env('DB_DRIVER', 'postgres'),

    'drivers' => [
        'mysql' => [
            'adapter'       => Mysql::class,
            'host'          => env('DB_HOST', 'localhost'),
            'port'          => env('DB_PORT', 3306),
            'username'      => env('DB_USERNAME', 'root'),
            'password'      => env('DB_PASSWORD', 'root'),
            'dbname'        => env('DB_DATABASE', 'skeleton'),
            'charset'       => env('DB_CHARSET', 'utf8'),
            'options'       => [
                PDO::FETCH_ASSOC            => true,
                PDO::ATTR_EMULATE_PREPARES  => false,
                PDO::ATTR_STRINGIFY_FETCHES => false,
            ]
        ],
        'postgres' => [
            'adapter'       => Postgresql::class,
            'host'          => env('DB_HOST', 'localhost'),
            'port'          => env('DB_PORT', 5432),
            'username'      => env('DB_USERNAME', 'root'),
            'password'      => env('DB_PASSWORD', 'root'),
            'dbname'        => env('DB_DATABASE', 'skeleton'),
            'schema'        => env('DB_SCHEMA', 'public'),
        ]
    ]
];
