<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\ViewDefault;

use Phalcon\Mvc\View as MvcView;


/**
 * Class View
 * @package App\Provider\ViewDefault
 */
class View extends MvcView {

    /**
     * @inheritDoc
     * @return string
     */
    public function getContent() {
        return '';
    }

}
