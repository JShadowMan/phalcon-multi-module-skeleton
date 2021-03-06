<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
namespace App\Frontend;

use App\Library\Middleware\Security;
use Bops\Module\AbstractModule;
use Phalcon\DiInterface;
use Phalcon\Loader;


/**
 * Class Module
 * @package App\Frontend
 */
class Module extends AbstractModule {

    protected function initialize() {
        container('middlewareQueue')->append(new Security());
    }

    /**
     * Returns the name of the current module
     *
     * @return string
     */
    protected function moduleName(): string {
        return 'frontend';
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
     * Returns an array of the config module filename without extname
     *
     * @return array
     */
    protected function configModules(): array {
        return [
            'source'
        ];
    }

    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface|null $di
     */
    public function registerAutoloaders(DiInterface $di = null) {
        (new Loader())->registerNamespaces([
            'App\Frontend' => __DIR__,
            'App\Frontend\Controller' => __DIR__ . DIRECTORY_SEPARATOR . 'controller',
            'App\Frontend\Library' => __DIR__ . DIRECTORY_SEPARATOR . 'library',
            'App\Frontend\Model' => __DIR__ . DIRECTORY_SEPARATOR . 'model',
            'App\Frontend\Provider' => __DIR__ . DIRECTORY_SEPARATOR . 'provider'
        ])->register();
    }

}
