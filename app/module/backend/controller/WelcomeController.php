<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Backend\Controller;

use App\Backend\Library\Mvc\Controller\AbstractController;


/**
 * Class WelcomeController
 * @package App\Backend\Controller
 */
class WelcomeController extends AbstractController {

    /**
     * Say hello
     */
    public function sayAction() {
        $this->jsonr->success(['text' => 'hello, world']);
    }

}
