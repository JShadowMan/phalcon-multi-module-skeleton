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
use App\Library\Mvc\Controller\Utils\Feature;
use Exception;
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
     * @return bool|void
     * @throws Exception
     */
    public function beforeException(Event $event, MvcDispatcher $dispatcher, Throwable $exception) {
        if (env('VERSION_FEATURE') && Feature::isCannotLoadedException($exception)) {
            $dispatcher->forward([
                'namespace' => Feature::fallbackVersion($dispatcher->getDefaultNamespace())
            ]);
            return false;
        }
    }

}
