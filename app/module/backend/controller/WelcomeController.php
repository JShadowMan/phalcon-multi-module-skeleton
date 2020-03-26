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
 * Class WelcomeController
 * @package App\Backend\Controller
 */
class WelcomeController extends AbstractController {

    /**
     * Say hello
     */
    public function sayAction() {
        $this->success(['text' => 'hello, world']);
    }

}
