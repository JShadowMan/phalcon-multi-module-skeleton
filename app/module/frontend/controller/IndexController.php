<?php
/**
 * This file is part of bops-example
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
namespace App\Frontend\Controller;

use App\Frontend\Library\Mvc\Controller\AbstractController;


/**
 * Class IndexController
 * @package App\Frontend\Controller
 */
class IndexController extends AbstractController {

    public function indexAction() {
        $this->db->query('select 1=1');
    }

}
