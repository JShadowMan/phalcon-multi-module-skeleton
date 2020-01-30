<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\UrlResolver;

use App\Provider\AbstractServiceProvider;
use Phalcon\Mvc\Url;


/**
 * Class ServiceProvider
 * @package App\Provider\UrlResolver
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'url';

    /**
     * @inheritDoc
     */
    final public function register() {
        $this->di->setShared($this->service_name, function() {
            $url = new Url();

            $config = container('config');
            if (!empty($config->application->staticUri)) {
                $url->setStaticBaseUri($config->application->staticUri);
            } else {
                $url->setStaticBaseUri('/');
            }

            if (!empty($config->application->baseUri)) {
                $url->setBaseUri($config->application->baseUri);
            } else {
                $url->setBaseUri('/');
            }

            return $url;
        });
    }

}
