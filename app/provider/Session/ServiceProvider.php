<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\Session;

use App\Provider\AbstractServiceProvider;
use Phalcon\Config;
use Phalcon\Session\AdapterInterface;


/**
 * Class ServiceProvider
 * @package App\Provider\Session
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'session';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->setShared($this->service_name, function() {
            $config = container('config')->session;
            /* @var Config $driver_config */
            $driver_config = $config->drivers->{$config->default};
            /** @noinspection PhpUndefinedFieldInspection */
            $driver = $driver_config->adapter;

            /* @var AdapterInterface $session */
            $session = new $driver(array_merge($driver_config->toArray(), [
                'prefix' => $config->prefix,
                'uniqueId' => $config->uniqueId,
                'lifetime' => $config->lifetime
            ]));
            $session->setName($config->name);
            $session->start();

            return $session;
        });
    }

}
