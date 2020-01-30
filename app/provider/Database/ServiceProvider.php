<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Database;

use App\Library\Listener\Adapter\Database as DatabaseListener;
use App\Provider\AbstractServiceProvider;
use Phalcon\Config;
use Phalcon\Db\Adapter;


/**
 * Class ServiceProvider
 * @package App\Provider\Database
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'db';

    /**
     * @inheritDoc
     */
    final public function register() {
        $this->di->setShared($this->service_name, function() {
            $config = container('config')->database;
            /* @var $driver_config Config */
            $driver_config = $config->drivers->{$config->default};
            /** @noinspection PhpUndefinedFieldInspection */
            $driver = $driver_config->adapter;

            $driver_config = $driver_config->toArray();
            unset($driver_config['adapter']);

            /* @var Adapter $connection */
            $connection = new $driver($driver_config);
            $connection->setEventsManager(container('eventsManager'));
            container('eventsManager')->attach('db', new DatabaseListener());

            return $connection;
        });
    }

}
