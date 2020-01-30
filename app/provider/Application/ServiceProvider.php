<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Application;

use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\Application
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'app';

    /**
     * @inheritdoc
     */
    final public function register() {
        $this->di->setShared($this->service_name, function() {
            return new Application();
        });
    }

}
