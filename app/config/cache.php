<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
use Phalcon\Cache\Backend\Redis;


return [
    'default' => env('CACHE_DRIVER', 'redis'),

    'drivers' => [
        'redis' => [
            'adapter'   => Redis::class,
            'host'      => env('REDIS_HOST', 'localhost'),
            'port'      => env('REDIS_PORT', 6379),
            'index'     => env('REDIS_INDEX', 0),
        ]
    ],

    'prefix' => env('CACHE_PREFIX', 'app_cache_'),
    'lifetime' => env('CACHE_LIFETIME', 86400)
];
