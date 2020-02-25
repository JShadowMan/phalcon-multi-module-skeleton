<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
return [
    'application' => [
        'debug'         => env('APP_DEBUG'),
        'baseUri'       => env('APP_BASE_URI'),
        'staticUri'     => env('APP_STATIC_URL')
    ],

    'error' => [
        'module'        => 'skeleton',
        'controller'    => 'error',
        'action'        => 'serverInternalError'
    ],
];
