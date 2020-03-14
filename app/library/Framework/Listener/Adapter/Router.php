<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Listener\Adapter;

use App\Library\Framework\Listener\AbstractListener;
use Phalcon\Events\Event;
use Phalcon\Mvc\Router as MvcRouter;


/**
 * Class Router
 * @package App\Library\Framework\Listener\Adapter
 */
class Router extends AbstractListener {

    /**
     * Sets status code when route not matched
     *
     * @param Event $event
     * @param MvcRouter $router
     */
    public function afterCheckRoutes(Event $event, MvcRouter $router) {
        if (!$router->wasMatched()) {
            $error = container('config')->notFound;
            if ($error->status_code) {
                container('response')->setStatusCode($error->status_code);
            }
        }
    }

}
