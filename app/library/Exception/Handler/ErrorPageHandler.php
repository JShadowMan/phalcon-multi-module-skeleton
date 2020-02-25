<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Exception\Handler;

use App\Provider\Application\Application;
use Exception;
use Phalcon\Mvc\Dispatcher;
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

            if ($error->module) {
                /* @var $application Application */
                $application = container('app');
                $application->startModule($error->module);
                /* @var $new_dispatcher Dispatcher */
                if ($new_dispatcher = container('dispatcher')) {
                    $dispatcher->setModuleName($new_dispatcher->getModuleName());
                    $dispatcher->setNamespaceName($new_dispatcher->getNamespaceName());
                    $dispatcher->setDefaultNamespace($new_dispatcher->getDefaultNamespace());
                }
            }
            $dispatcher->setFinish(false);
            $dispatcher->setControllerName($error->controller);
            $dispatcher->setActionName($error->action);

            return self::DONE;
        } catch (Throwable $e) {
            container('logger', 'sys')->error($e->getMessage());
            return self::QUIT;
        }
    }

}
