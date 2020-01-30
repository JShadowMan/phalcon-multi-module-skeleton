<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Cache;

use App\Provider\AbstractServiceProvider;
use Phalcon\Cache\Frontend\Data;
use Phalcon\Config;


/**
 * Class ServiceProvider
 * @package App\Provider\Cache
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'cache';

    /**
     * @inheritdoc
     */
    final public function register() {
        $this->di->setShared($this->service_name, function() {
            $config = container('config')->cache;
            /* @var Config $driver_config */
            $driver_config = $config->drivers->{$config->default};

            /** @noinspection PhpUndefinedFieldInspection */
            $driver = $driver_config->adapter;
            $driver_config = array_merge($driver_config->toArray(), ['prefix' => $config->prefix]);

            return new $driver(new Data(['lifetime' => $config->lifetime]), $driver_config);
        });
    }

}
