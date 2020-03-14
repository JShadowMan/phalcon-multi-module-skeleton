<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
use App\Backend\Module as BackendModule;
use App\Frontend\Module as FrontendModule;


return [
    'classes' => [
        'backend' => [
            'path' => module_path('backend/Module.php'),
            'className' => BackendModule::class,
            'metadata' => [
                'versionFeature' => true,
            ]
        ],
        'frontend' => [
            'path' => module_path('frontend/Module.php'),
            'className' => FrontendModule::class,
            'metadata' => [
                'versionFeature' => false,
            ]
        ],
    ],

    'default' => env('MODULE_DEFAULT', null)
];
