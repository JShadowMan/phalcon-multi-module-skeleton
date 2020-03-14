<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\DispatcherDefault;

use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\DispatcherDefault
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'dispatcher';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->setShared($this->service_name, function() {
            return container('dispatcherTemplate', /* module name */'', /* empty config */[]);
        });
    }

    /**
     * @inheritDoc
     */
    public function initialize() {
        container($this->service_name);
    }

}
