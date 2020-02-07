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
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Throwable;


/**
 * Class Dispatcher
 * @package App\Library\Listener\Adapter
 */
class Dispatcher extends AbstractListener {

    /**
     * Triggered before the dispatcher throws any exception
     *
     * @param Event $event
     * @param MvcDispatcher $dispatcher
     * @param Throwable $exception
     */
    public function beforeException(Event $event, MvcDispatcher $dispatcher, Throwable $exception) {
        echo $exception->getMessage() . PHP_EOL;
        echo $dispatcher->getControllerName() . '::' . $dispatcher->getActionName() . PHP_EOL;
        echo "<pre>";
        var_dump($exception);
        echo "</pre>";
        die();
    }

}
