<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider;


/**
 * Interface ServiceProviderInterface
 * @package App\Provider
 */
interface  ServiceProviderInterface {

    /**
     * Get the service name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Register the service
     *
     * @return void
     */
    public function register();

    /**
     * Initializing the service
     *
     * @return void
     */
    public function initialize();

}
