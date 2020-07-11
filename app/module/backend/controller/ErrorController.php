<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
namespace App\Backend\Controller;

use App\Backend\Library\Mvc\Controller\AbstractController;
use Bops\Http\Request\Middleware\MiddlewareInterface;
use Throwable;


/**
 * Class ErrorController
 * @package App\Backend\Controller
 */
class ErrorController extends AbstractController {

    public function internalAction(Throwable $exception) {
        $this->error($exception->getMessage(), $exception->getCode());
    }

    public function middlewareAction(MiddlewareInterface $middleware) {
        $this->error(get_class($middleware), 'err');
    }

}
