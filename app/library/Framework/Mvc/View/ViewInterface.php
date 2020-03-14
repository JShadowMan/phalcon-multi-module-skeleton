<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Mvc\View;


/**
 * Interface ViewInterface
 * @package App\Library\Framework\Mvc\View
 */
interface ViewInterface {

    /**
     * Load config
     *
     * @param array $config
     * @return $this
     */
    public function loadConfig(array $config);

}
