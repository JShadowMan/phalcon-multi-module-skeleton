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
use Phalcon\Config;
use Phalcon\DiInterface;


/**
 * Class AbstractModule
 * @package App\Library\Mvc\Module
 */
abstract class AbstractModule implements ModuleInterface {

    /**
     * The name of the module-config service
     *
     * @var string
     */
    protected $config_service = 'moduleConfig';

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di) {
        $this->setupModuleConfig($di);
        $this->setupDispatcher($di);
        $this->setupView($di);

        foreach ($this->serviceProviders() as $provider) {
            ServiceProviderInstaller::setup(new $provider($di));
        }
    }

    /**
     * Returns an array of the service providers
     *
     * @return string[]
     */
    protected function serviceProviders(): array {
        return [];
    }

    /**
     * Returns an array of the config module filename without extname
     *
     * @return array
     */
    protected function configModules(): array {
        return [];
    }

    /**
     * Returns the name of the current module
     *
     * @return string
     */
    abstract protected function moduleName(): string;

    /**
     * Returns the path of module configure dir
     *
     * @return string
     */
    abstract protected function configDirPath(): string;

    /**
     * Setup the configure of current module
     *
     * @param DiInterface $di
     */
    private function setupModuleConfig(DiInterface $di): void {
        if (!empty($this->configDirPath()) && !empty($this->config_service)) {
            $self = $this; $configs = $this->configModules();
            $di->setShared($this->config_service, function() use ($self, $configs) {
                $config_name = str_replace('\\', '_', strtolower(get_class($self)));
                return (new Factory($config_name, function(string $path) use ($self) {
                    return rtrim($self->configDirPath(), '/\\') . ($path ? "/{$path}" : '');
                }))->load(array_merge(['config'], $configs));
            });
        } else {
            $di->setShared($this->config_service, new Config());
        }
    }

    /**
     * Setup the dispatcher service from moduleConfig
     *
     * @param DiInterface $di
     */
    private function setupDispatcher(DiInterface $di): void {
        if (isset(container('moduleConfig')->module->dispatcher)) {
            /* @var $config Config */
            if ($config = container('moduleConfig')->module->dispatcher) {
                $module = $this->moduleName();
                $di->setShared('dispatcher', function() use ($module, $config) {
                    return container('dispatcherTemplate', $module, $config->toArray());
                });
            }
        }
    }

    /**
     * Setup the view service from moduleConfig
     *
     * @param DiInterface $di
     */
    private function setupView(DiInterface $di): void {
        if (isset(container('moduleConfig')->module->view)) {
            if ($config = container('moduleConfig')->module->view) {
                if ($config->uses === true) {
                    $di->setShared('view', function() use ($config) {
                        /* @var $config Config */
                        return container('viewTemplate', $config->toArray());
                    });
                } else {
                    // disabled view implicit
                    container('app')->useImplicitView(false);
                }
            }
        }
    }

}
