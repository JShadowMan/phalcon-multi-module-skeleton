<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\Field;

use App\Provider\Field\Store\Adapter\Cache;
use App\Provider\Field\Store\Adapter\Database;
use App\Provider\Field\Store\Adapter\Memory;
use App\Provider\Field\Store\Adapter\Mixed;
use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\Field
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'field';

    /**
     * @inheritdoc
     */
    final public function register() {
        $this->di->set($this->service_name, function() {
            return new Mixed(new Memory(), new Cache(), new Database());
        });
    }

}
