<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
return [
    'module' => [
        'dispatcher' => [
            'controllerNamespace' => 'App\Skeleton\Controller'
        ],
        'view' => [
            'uses' => true, // html
            'viewDir' => module_path('skeleton/view'),
        ],
    ],
];
