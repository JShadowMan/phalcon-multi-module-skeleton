<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
use App\Skeleton\Module as SkeletonModule;


return [
    'classes' => [
        'skeleton' => [
            'path' => module_path('skeleton/Module.php'),
            'className' => SkeletonModule::class,
            'metadata' => [
                'version_feature' => true,
            ]
        ],
    ],

    'default' => env('MODULE_DEFAULT', null)
];
