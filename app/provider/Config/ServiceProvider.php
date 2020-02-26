<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Config;

use App\Library\Framework\Config\Factory;
use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\Config
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'config';

    /**
     * Components of configure
     *
     * @var array
     */
    protected $configs = [
        'cache',
        'config',
        'database',
        'locale',
        'logger',
        'modules',
        'session',
        'timezone'
    ];

    /**
     * @inheritDoc
     */
    final public function register() {
        $configs = $this->configs;
        $this->di->setShared($this->service_name, function() use ($configs) {
            return (new Factory('global'))->load($configs);
        });
    }

}
