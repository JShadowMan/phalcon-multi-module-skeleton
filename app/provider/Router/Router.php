<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Router;

use Phalcon\Mvc\Router as MvcRouter;


/**
 * Class Router
 * @package App\Provider\Router
 */
final class Router extends MvcRouter {

    /**
     * Router constructor.
     * @param bool $defaultRoutes
     */
    public function __construct($defaultRoutes = true) {
        parent::__construct($defaultRoutes);

        $this->add('/:module/:controller/:action/:params', [
            'module' => 1,
            'controller' => 2,
            'action' => 3,
            'params' => 4
        ]);
    }

}
