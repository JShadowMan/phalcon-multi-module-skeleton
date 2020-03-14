<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\DispatcherTemplate;

use App\Library\Framework\Dispatcher\Dispatcher;
use App\Library\Framework\Listener\Adapter\Dispatcher as DispatcherListener;
use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\DispatcherTemplate
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'dispatcherTemplate';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function(string $module, array $config) {
            $dispatcher = new Dispatcher();
            $dispatcher->setEventsManager(container('eventsManager'));
            container('eventsManager')->attach('dispatch', new DispatcherListener());

            return $dispatcher->loadConfig($config, $module);
        });
    }

}
