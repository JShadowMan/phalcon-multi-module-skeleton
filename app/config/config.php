<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
return [
    'application' => [
        'debug'         => env('APP_DEBUG'),
        'baseUri'       => env('APP_BASE_URI'),
        'staticUri'     => env('APP_STATIC_URL')
    ],

    'error' => [
        'controller'    => 'error',
        'action'        => 'serverInternalError',
        'status_code'   => '404',
        'error_message' => ''
    ],

    'notFound' => [
        'controller'    => 'error',
        'action'        => 'notFound',
        'status_code'   => '404'
    ]
];
