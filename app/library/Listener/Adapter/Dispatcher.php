<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Listener\Adapter;

use App\Library\Feature\Version;
use App\Library\Listener\AbstractListener;
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
        /* @var Version $version */
        $version = container('versionFeature');
        if ($version->isVersionHandlerException($exception)) {
            do {
                if ($version->getNumber() !== 1) {
                    $config = container('config')->error;
                    if ($dispatcher->getControllerName() !== $config->controller) {
                        break;
                    }
                }

                if ($version->check($dispatcher->getModuleNameWithDefault())) {
                    $dispatcher->forward([
                        'namespace' => $version->namespaceFallback($dispatcher->getDefaultNamespace())
                    ]);
                    return false;
                }
            } while (false);
        }

        container('errorHandler')->handleException($exception);
        return false;
    }

}
