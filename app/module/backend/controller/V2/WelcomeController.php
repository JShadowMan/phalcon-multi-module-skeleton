<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Backend\Controller\V2;

use App\Backend\Library\Mvc\Controller\AbstractController;
use App\Library\Framework\Mvc\Controller\Tag\Deeper;


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
        $this->jsonr->success(['text' => 'nice to meet you']);
    }

}
