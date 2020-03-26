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
            'controllerNamespace' => 'App\Frontend\Controller'
        ],
        'view' => [
            'uses' => true, // html by default
            'viewDir' => container('navigator')->moduleDir('frontend/view'),
        ],
    ],
];
