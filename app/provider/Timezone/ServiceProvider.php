<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Timezone;

use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\Timezone
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'timezone';

    /**
     * @inheritDoc
     */
    final public function register() {
        $this->di->set($this->service_name, function(?string $timezone = null) {
            $config = container('config')->timezone;
            if (!$timezone) {
                $timezone = $config->default;
            }

            date_default_timezone_set($timezone);
            return $timezone;
        });
    }

    /**
     * @inheritDoc
     */
    final public function initialize() {
        container($this->service_name);
    }

}
