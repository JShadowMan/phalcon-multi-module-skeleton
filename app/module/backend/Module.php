<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
namespace App\Backend;

use Bops\Module\AbstractModule;
use Phalcon\DiInterface;
use Phalcon\Loader;


/**
 * Class Module
 * @package App\Backend
 */
class Module extends AbstractModule {

    /**
     * Returns the name of the current module
     *
     * @return string
     */
    protected function moduleName(): string {
        return 'backend';
    }

    /**
     * Returns the path of module configure dir
     *
     * @return string
     */
    protected function configDir(): string {
        return __DIR__ . '/config';
    }

    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null) {
        (new Loader())->registerNamespaces([
            'App\Backend' => __DIR__,
            'App\Backend\Controller' => __DIR__ . DIRECTORY_SEPARATOR . 'controller',
            'App\Backend\Library' => __DIR__ . DIRECTORY_SEPARATOR . 'library',
            'App\Backend\Model' => __DIR__ . DIRECTORY_SEPARATOR . 'model',
            'App\Backend\Provider' => __DIR__ . DIRECTORY_SEPARATOR . 'provider'
        ])->register();
    }

}
