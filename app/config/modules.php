<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
use App\Backend\Module as BackendModule;
use App\Skeleton\Module as SkeletonModule;


return [
    'classes' => [
        'backend' => [
            'path' => module_path('backend/Module.php'),
            'className' => BackendModule::class,
            'metadata' => [
                'versionFeature' => true,
            ]
        ],
        'skeleton' => [
            'path' => module_path('skeleton/Module.php'),
            'className' => SkeletonModule::class,
            'metadata' => [
                'versionFeature' => true,
            ]
        ],
    ],

    'default' => env('MODULE_DEFAULT', null)
];
