<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Backend\Controller;

use App\Backend\Library\Mvc\Controller\AbstractController;


/**
 * Class ErrorController
 * @package App\Backend\Controller
 */
class ErrorController extends AbstractController {

    public function serverInternalErrorAction(\Throwable $exception) {
        $this->jsonr->error($exception->getCode(), $exception->getMessage());
    }

}
