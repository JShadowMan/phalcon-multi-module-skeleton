<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\DispatcherFactory;

use App\Library\Listener\Adapter\Dispatcher as DispatcherListener;
use App\Provider\AbstractServiceProvider;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;


/**
 * Class ServiceProvider
 * @package App\Provider\DispatcherFactory
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'dispatcherFactory';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function(array $config) {
            $dispatcher = new MvcDispatcher();
            $dispatcher->setEventsManager(container('eventsManager'));
            container('eventsManager')->attach('dispatch', new DispatcherListener());

            if (!empty($config['controllerNamespace'])) {
                $dispatcher->setDefaultNamespace($config['controllerNamespace']);
            }

            return $dispatcher;
        });
    }

}
