<?php
/**
 * ControllerBase.php
 *
 * @package   here
 * @author    ShadowMan <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2018 ShadowMan
 * @license   MIT License
 * @link      https://github.com/JShadowMan/here
 */
namespace PMms\Controllers;


use Phalcon\Cache\Backend\Redis;
use Phalcon\Config;
use Phalcon\Dispatcher;
use Phalcon\Mvc\Controller;


/**
 * Class ControllerBase
 * @package PMms\Controllers
 */
abstract class ControllerBase extends Controller {

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Redis
     */
    protected $cache;

    /**
     * initializing controller first
     */
    final public function initialize() {
        // configure object
        $this->config = $this->di->get('config');
        // redis cache backend
        $this->cache = $this->di->get('cache');
    }

    /**
     * @param Dispatcher $dispatcher
     */
    final public function beforeExecuteRoute(Dispatcher $dispatcher) {
    }

}
