<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Mvc\View\Adapter;

use App\Library\Mvc\View\AbstractView;


/**
 * Class Html
 * @package App\Library\Mvc\View\Adapter
 */
class Html extends AbstractView {

    /**
     * Load config
     *
     * @param array $config
     * @return $this
     */
    public function loadConfig(array $config) {
        if (!empty($config['viewDir'])) {
            $this->setViewsDir($config['viewDir']);
        }
        return $this;
    }

}
