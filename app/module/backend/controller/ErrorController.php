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


/**
 * Class ErrorController
 * @package App\Backend\Controller
 */
class ErrorController extends AbstractController {

    public function internalAction() {
        $this->error('error message', 'code', func_get_args());
    }

}
