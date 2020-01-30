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
        $error = container('config')->error;
        /* @var Dispatcher $dispatcher */
        $dispatcher = container('dispatcher');
        /* @var View $view */
        $view = container('view');
        /* @var Response $response */
        $response = container('response');

        $dispatcher->setControllerName($error->controller);
        $dispatcher->setActionName($error->action);

        $view->start();
        $dispatcher->dispatch();
        $view->render($error->controller, $error->action, $dispatcher->getParams());
        $view->finish();

        $response->setContent($view->getContent())->send();
        return self::QUIT;
    }

}
