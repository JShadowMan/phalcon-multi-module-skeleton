<?php
/**
 * configure for PMms
 *
 * @package   PMms
 * @author    Jayson Wang <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2018 Jayson Wang
 */
namespace PMms\Config;


use PMms\Backend\BackendModule;
use PMms\Frontend\FrontendModule;
use Phalcon\Config;


return new Config(array(
    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'mysql',
        'username' => 'root',
        'password' => 'root',
        'dbname' => '',
        'charset' => 'utf8mb4',
    ),
    'cache' => array(
        'backend' => array(
            'adapter' => 'Redis',
            'host' => 'redis',
            'port' => '6379'
        ),
        'frontend' => array(
            'adapter' => 'Data',
            'lifetime' => 5 * 60
        )
    ),
    'frontend' => array(
        'module_root' => FRONTEND_MODULE_ROOT . '/',
        'controllers_root' => FRONTEND_MODULE_ROOT . '/controllers',
        'models_root' => FRONTEND_MODULE_ROOT . '/models',
        'views_root' => APPLICATION_ROOT . '/views/frontend'
    ),
    'backend' => array(
        'module_root' => BACKEND_MODULE_ROOT . '/',
        'controllers_root' => BACKEND_MODULE_ROOT . '/controllers',
        'models_root' => BACKEND_MODULE_ROOT . '/models',
        'views_root' => APPLICATION_ROOT . '/views/backend'
    ),
    'application' => array(
        'application_root' => APPLICATION_ROOT . '/',
        'configs_root' => APPLICATION_ROOT . '/configs',
        'models_root' => APPLICATION_ROOT . '/models',
        'plugins_root' => APPLICATION_ROOT . '/plugins',
        'libraries_root' => APPLICATION_ROOT . '/libraries',
        'controllers_root' => APPLICATION_ROOT . '/controllers',
        'base_uri' => '/',
        'compiled_templates_root' => APPLICATION_ROOT . '/caches/compiled_templates',
        'caches_root' => DOCUMENT_ROOT . '/caches',
        'logging_root' => DOCUMENT_ROOT . '/logs'
    ),
    'modules' => array(
        'frontend' => array(
            'className' => FrontendModule::class,
            'path' => FRONTEND_MODULE_ROOT . '/FrontendModule.php',
            'metadata' => array(
                'controllers_namespace' => 'PMms\Frontend\Controllers',
                'controllers_suffix' => '',
                'actions_suffix' => ''
            )
        ),
        'backend' => array(
            'className' => BackendModule::class,
            'path' => BACKEND_MODULE_ROOT . '/BackendModule.php',
            'metadata' => array(
                'controllers_namespace' => 'PMms\Backend\Controllers',
                'controllers_suffix' => '',
                'actions_suffix' => ''
            )
        )
    ),
    'logging' => array(
        'adapter' => 'File',
        'name' => 'pmms.log'
    )
));
