<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Skeleton\Controller;

use App\Skeleton\Library\Mvc\Controller\AbstractController;


/**
 * Class ErrorController
 * @package App\Skeleton\Controller
 */
class ErrorController extends AbstractController {

    public function serverInternalErrorAction() {
        $this->view->render($this->dispatcher->getControllerName(), $this->dispatcher->getActionName());
    }

}
