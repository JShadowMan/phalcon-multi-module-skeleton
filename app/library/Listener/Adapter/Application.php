<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Listener\Adapter;

use App\Library\Listener\AbstractListener;
use Phalcon\Events\Event;
use Phalcon\Mvc\Application as MvcApplication;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;


/**
 * Class Application
 * @package App\Library\Listener\Adapter
 */
class Application extends AbstractListener {

    /**
     * @param Event $event
     * @param MvcApplication $app
     * @param MvcDispatcher $dispatcher
     */
    public function beforeHandleRequest(Event $event, MvcApplication $app, MvcDispatcher $dispatcher) {
        // @TODO inject request
    }

}
