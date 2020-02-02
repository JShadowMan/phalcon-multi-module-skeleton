<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Mvc\Module;

use App\Library\Config\Factory;
use App\Provider\ServiceProviderInstaller;
use Phalcon\DiInterface;


/**
 * Class AbstractModule
 * @package App\Library\Mvc\Module
 */
abstract class AbstractModule implements ModuleInterface {

    /**
     * Paths of configure file
     *
     * @var string
     */
    protected $config_path;

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di) {
        foreach ($this->providers() as $provider) {
            ServiceProviderInstaller::setup(new $provider($di));
        }
    }

    /**
     * Returns an array of the service providers
     *
     * @return string[]
     */
    protected function providers(): array {
        return [];
    }

    /**
     * Setup the configure of current module
     *
     * @param DiInterface $di
     */
    private function setupModuleConfig(DiInterface $di): void {
        if (!empty($this->config_path)) {
            $basedir = $this->config_path;
            $di->setShared('moduleConfig', function() use ($basedir) {
                return Factory::create([], $basedir);
            });
        }
    }

}
