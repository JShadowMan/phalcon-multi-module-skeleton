<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Exception\Handler;

use Exception;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Throwable;
use Whoops\Handler\Handler;


/**
 * Class ErrorPageHandler
 * @package App\Library\Exception\Handler
 */
final class ErrorPageHandler extends Handler {

    /**
     * @inheritDoc
     * @return int|null
     * @throws Exception
     */
    final public function handle() {
        try {
            $error = container('config')->error;
            /* @var Dispatcher $dispatcher */
            $dispatcher = container('dispatcher');

            $dispatcher->setControllerName($error->controller);
            $dispatcher->setActionName($error->action);
            $dispatcher->dispatch();

            return self::QUIT;
        } catch (Throwable $e) {
            var_dump($e);
            return self::DONE;
        }
    }

}
