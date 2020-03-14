<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Mvc\Controller\Mixin;

use App\Library\Framework\Exception\Mvc\UnknownRestMethodException;
use Phalcon\Mvc\Controller;
use function App\Library\Framework\Xet\array_at;


/**
 * Trait REST
 *
 * @package App\Library\Framework\Mixin\Mvc\Controller
 * @mixin Controller
 * @method restRetrieve()
 * @method restCreate()
 * @method restReplace()
 * @method restUpdate()
 * @method restDelete()
 */
trait REST {

    /**
     * Representational state transfer distributed
     *
     * @link https://en.wikipedia.org/wiki/Representational_state_transfer
     * @throws UnknownRestMethodException
     */
    public function indexAction() {
        $this->dispatch(array_at([
            'get' => 'restRetrieve',
            'post' => 'restCreate',
            'put' => env('RESTFUL_MERGE_UPDATE') ? 'restUpdate' : 'restReplace',
            'patch' => 'restUpdate',
            'update' => 'restUpdate',
            'delete' => 'restDelete'
        ], strtolower($this->request->getMethod()), ''));
    }

    /**
     * Forward request base on method of http
     *
     * @param string $method
     * @return mixed
     * @throws UnknownRestMethodException
     */
    private function dispatch(string $method = '') {
        if (!empty($method) && method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new UnknownRestMethodException("The method '{$this->request->getMethod()}' unknown to forward");
    }

}
