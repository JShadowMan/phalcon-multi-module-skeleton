<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Application;

use Phalcon\DiInterface;
use Phalcon\Mvc\Application as MvcApplication;


/**
 * Class Application
 * @package App\Provider\Application
 */
final class Application extends MvcApplication {

    /**
     * Initializing the modules for application
     *
     * @param DiInterface|null $di
     */
    final public function __construct(DiInterface $di = null) {
        parent::__construct(($di ?? container()));
        $this->setEventsManager(container('eventsManager'));
        $this->setupModules();
    }

    /**
     * Setups the multi modules supported, and register all modules
     * to the application
     */
    final private function setupModules() {
        $this->registerModules(container('config')->modules->classes->toArray());
        $this->setDefaultModule(container('config')->modules->default);
    }

}
