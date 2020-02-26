<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\ViewJson;

use App\Library\Listener\Adapter\View as ViewListener;
use App\Library\Mvc\View\Adapter\Json;
use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\ViewJson
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * @var string
     */
    protected $service_name = 'viewJson';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function(array $config) {
            $view = new Json();

            $view->setEventsManager(container('eventsManager'));
            container('eventsManager')->attach('view', new ViewListener());

            return $view->loadConfig($config);
        });
    }

}
