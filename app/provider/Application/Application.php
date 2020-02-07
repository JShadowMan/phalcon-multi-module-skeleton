<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Application;

use App\Library\Listener\Adapter\Application as ApplicationListener;
use Phalcon\DiInterface;
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
     * Setups the multi modules supported, and register all modules
     * to the application
     */
    private function setupModules() {
        $this->registerModules(container('config')->modules->classes->toArray());
        $this->setDefaultModule(container('config')->modules->default);
    }

}
