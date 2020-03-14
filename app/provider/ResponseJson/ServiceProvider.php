<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\ResponseJson;

use App\Library\Framework\Http\Response\Formatter\Adapter\Json;
use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\ResponseJson
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'jsonr';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->setShared($this->service_name, function() {
            return new Json();
        });
    }

    /**
     * @inheritDoc
     */
    public function initialize() {
        container($this->service_name);
    }

}
