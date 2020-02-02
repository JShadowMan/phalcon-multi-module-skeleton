<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Skeleton;

use App\Library\Mvc\Module\AbstractModule;
use Phalcon\DiInterface;
use Phalcon\Loader;


/**
 * Class Module
 * @package App\Skeleton
 */
class Module extends AbstractModule {

    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null) {
        (new Loader())->registerNamespaces([
            'App\Skeleton' => __DIR__,
            'Here\Skeleton\Controller' => __DIR__ . DIRECTORY_SEPARATOR . 'controller',
            'Here\Skeleton\Library' => __DIR__ . DIRECTORY_SEPARATOR . 'library',
            'Here\Skeleton\Model' => __DIR__ . DIRECTORY_SEPARATOR . 'model',
            'Here\Skeleton\Provider' => __DIR__ . DIRECTORY_SEPARATOR . 'provider'
        ])->register();
    }

}
