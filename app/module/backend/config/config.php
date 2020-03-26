<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
return [
    'module' => [
        'dispatcher' => [
            'controllerNamespace' => 'App\Backend\Controller'
        ],
        'view' => [
            'uses' => 'json',
            'jsonFlags' => JSON_UNESCAPED_UNICODE,
        ],
    ],
];
