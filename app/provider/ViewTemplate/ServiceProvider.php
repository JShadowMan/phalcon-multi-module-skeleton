<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\ViewTemplate;

use App\Library\Listener\Adapter\View as ViewListener;
use App\Provider\AbstractServiceProvider;
use Phalcon\Mvc\View as MvcView;


/**
 * Class ServiceProvider
 * @package App\Provider\ViewTemplate
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'viewTemplate';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function(array $config) {
            $view = new MvcView();
            $view->registerEngines([
                '.volt' => container('volt', $view, $this)
            ]);

            $view->setEventsManager(container('eventsManager'));
            container('eventsManager')->attach('view', new ViewListener());

            if (!empty($config['viewDir'])) {
                $view->setViewsDir($config['viewDir']);
            }

            return $view;
        });
    }

}
