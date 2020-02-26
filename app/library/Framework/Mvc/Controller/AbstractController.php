<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Mvc\Controller;

use Phalcon\Config;
use Phalcon\Mvc\Controller;


/**
 * Class AbstractController
 * @package App\Library\Framework\Mvc\Controller
 * @property Config $config
 * @property Config $moduleConfig
 */
abstract class AbstractController extends Controller {

    /**
     * fix status code invalid with version feature fallback
     */
    public function initialize() {
        $this->response->setStatusCode(200);
    }

}
