<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Mvc\Controller\Mixin;

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;


/**
 * Trait Deeper
 *
 * @package App\Library\Framework\Mvc\Controller\Mixin
 */
trait Deeper {

    /**
     * @param Event $event
     * @param Dispatcher $dispatcher
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher) {
        // @todo forward from action and params?
    }

}
