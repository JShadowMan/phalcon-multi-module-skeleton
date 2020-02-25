<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Mvc\View;

use Phalcon\Mvc\View as MvcView;


/**
 * Class View
 * @package App\Library\Mvc\View
 */
class View extends MvcView {

    /**
     * Load config
     *
     * @param array $config
     * @return View
     */
    public function loadConfig(array $config) {
        if (!empty($config['viewDir'])) {
            $this->setViewsDir($config['viewDir']);
        }

        return $this;
    }

}
