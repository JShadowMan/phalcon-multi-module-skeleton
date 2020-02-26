<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Environment;

use App\Library\Framework\Bootstrap;
use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\Environment
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'environment';

    /**
     * @inheritDoc
     */
    final public function register() {
        /* @var $bootstrap Bootstrap */
        $bootstrap = $this->di->getShared('bootstrap');
        $this->di->set($this->service_name, function() use ($bootstrap) {
            $environment = $bootstrap->getEnvironment();
            if (func_num_args() !== 0) {
                foreach (func_get_args() as $arg) {
                    if ($arg === $environment) {
                        return true;
                    }
                }
                return false;
            }
            return $environment;
        });
    }

}
