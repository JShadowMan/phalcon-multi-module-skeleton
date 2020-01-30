<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider;


/**
 * Class ServiceProviderInstaller
 * @package App\Provider
 */
final class ServiceProviderInstaller {

    /**
     * Install and setup provider
     *
     * @param ServiceProviderInterface $provider
     */
    final public static function setup(ServiceProviderInterface $provider) {
        $provider->register();
        $provider->initialize();
    }

}
