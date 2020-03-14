<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
use Phalcon\Session\Adapter\Redis;


return [
    'default' => env('SESSION_DRIVER', 'redis'),

    'drivers' => [
        'redis' => [
            'adapter'       => Redis::class,
            'host'          => env('REDIS_HOST', 'localhost'),
            'port'          => env('REDIS_PORT', 6379),
            'index'         => env('REDIS_INDEX', 0),
            'persistent'    => true,
        ]
    ],

    'prefix'    => env('SESSION_PREFIX', 'app_session_'),
    'uniqueId'  => env('SESSION_UNIQUE_ID', 'app_'),
    'lifetime'  => env('SESSION_LIFETIME', 3600),
    'name'      => env('SESSION_NAME', 'hs'),
];
