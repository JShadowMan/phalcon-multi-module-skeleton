<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
return [
    'module' => [
        'dispatcher' => [
            'controllerNamespace' => 'App\Backend\Controller'
        ],
        'view' => [
            'uses' => 'json',
            'jsonFlags' => JSON_UNESCAPED_UNICODE,
            'jsonFormat' => [
                'code' => 'f',
                'message' => 'm',
                'data' => 'd',
                'extra' => 'e'
            ]
        ],
    ],
];
