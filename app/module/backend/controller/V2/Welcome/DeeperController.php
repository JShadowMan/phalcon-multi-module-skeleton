<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Backend\Controller\V2\Welcome;

use App\Backend\Library\Mvc\Controller\AbstractController;


/**
 * Class DeeperController
 *
 * @package App\Backend\Controller\V2\Welcome
 */
class DeeperController extends AbstractController {

    /**
     * Greet again
     */
    public function sayAction() {
        $this->jsonr->success(['text' => 'see you again', 'params' => $this->dispatcher->getParams()]);
    }

}
