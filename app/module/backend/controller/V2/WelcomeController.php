<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
namespace App\Backend\Controller\V2;

use App\Backend\Library\Mvc\Controller\AbstractController;
use Bops\Mvc\Controller\Tagging\Deeper;


/**
 * Class WelcomeController
 *
 * @package App\Backend\Controller\V2
 */
class WelcomeController extends AbstractController implements Deeper {

    /**
     * Greet
     */
    public function sayAction() {
        $this->success(['text' => 'nice to meet you']);
    }

}
