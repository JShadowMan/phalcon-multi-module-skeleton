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
     * Paths of configure file
     *
     * @var string
     */
    protected $config_path = __DIR__ . '/config';

    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null) {
        (new Loader())->registerNamespaces([
            'App\Skeleton' => __DIR__,
            'App\Skeleton\Controller' => __DIR__ . DIRECTORY_SEPARATOR . 'controller',
            'App\Skeleton\Library' => __DIR__ . DIRECTORY_SEPARATOR . 'library',
            'App\Skeleton\Model' => __DIR__ . DIRECTORY_SEPARATOR . 'model',
            'App\Skeleton\Provider' => __DIR__ . DIRECTORY_SEPARATOR . 'provider'
        ])->register();
    }

    /**
     * @inheritDoc
     * @return array
     */
    protected function configModules(): array {
        return [
            'source'
        ];
    }

}
