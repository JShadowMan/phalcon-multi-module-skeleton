<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
use App\Backend\Module as BackendModule;
use App\Frontend\Module as FrontendModule;


return [
    'backend' => [
        'path' => container('navigator')->moduleDir('backend/Module.php'),
        'className' => BackendModule::class,
        'metadata' => [
            'versionUri' => true,
        ]
    ],
    'frontend' => [
        'path' => container('navigator')->moduleDir('frontend/Module.php'),
        'className' => FrontendModule::class,
        'metadata' => []
    ],
];
