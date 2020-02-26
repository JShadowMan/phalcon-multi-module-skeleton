<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Application;

use App\Library\Framework\Listener\Adapter\Application as ApplicationListener;
use App\Library\Module\ModuleInterface;
use App\Provider\Router\Router;
use Phalcon\DiInterface;
use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Application as MvcApplication;


/**
 * Class Application
 * @package App\Provider\Application
 */
class Application extends MvcApplication {

    /**
     * Initializing the modules for application
     *
     * @param DiInterface|null $di
     */
    public function __construct(DiInterface $di = null) {
        parent::__construct(($di ?? container()));

        $this->setEventsManager(container('eventsManager'));
        container('eventsManager')->attach('application', new ApplicationListener());

        $this->setupModules();
    }

    /**
     * @param null $uri
     * @return ResponseInterface
     */
    public function handle($uri = null) {
        /* @var Router $router */
        $router = container('router');
        return parent::handle($router->getVersionFeatureUri());
    }

    /**
     * Startup a module
     *
     * @param string $module
     * @return bool
     */
    public function startModule(string $module): bool {
        if (container('eventsManager')->fire('application:beforeStartModule', $this, $module) === false) {
            return false;
        }

        if ($config = $this->getModule($module)) {
            if (is_array($config)) {
                if (isset($config['className'])) {
                    if (!class_exists($config['className'])) {
                        /** @noinspection PhpIncludeInspection */
                        require_once $config['path'];
                    }

                    /* @var ModuleInterface $instance */
                    $instance = $this->di->get($config['className']);
                    if (method_exists($instance, 'setStartWithError')) {
                        $instance->setStartWithError();
                    }

                    $instance->registerAutoloaders($this->di);
                    $instance->registerServices($this->di);
                    container('eventsManager')->fire('application:afterStartModule', $this, $instance);
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Setups the multi modules supported, and register all modules
     * to the application
     */
    private function setupModules() {
        $this->registerModules(container('config')->modules->classes->toArray());
        $this->setDefaultModule(container('config')->modules->default);
    }

}
