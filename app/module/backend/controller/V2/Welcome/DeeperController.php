<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
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
        $this->success(['text' => 'see you again', 'params' => $this->dispatcher->getParams()]);
    }

}
