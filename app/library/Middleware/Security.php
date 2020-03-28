<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
namespace App\Library\Middleware;

use Bops\Http\Request\Middleware\MiddlewareInterface;
use Phalcon\Http\RequestInterface;


/**
 * Class Security
 *
 * @package App\Library\Middleware
 */
class Security implements MiddlewareInterface {

    /**
     * Process an incoming server request.
     *
     * @param RequestInterface $request
     * @return bool
     */
    public function process(RequestInterface $request): bool {
        return $request->hasQuery('timestamp');
    }

}
