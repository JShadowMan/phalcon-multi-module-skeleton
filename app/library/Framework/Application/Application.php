<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Application;

use App\Library\Framework\Listener\Adapter\Application as ApplicationListener;
use Phalcon\DiInterface;
use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Application as MvcApplication;


/**
 * Class Application
 *
 * @package App\Library\Framework\Application
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
        /* @see Router::getVersionFeatureUri() */
        return parent::handle(container('router')->getVersionFeatureUri());
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
