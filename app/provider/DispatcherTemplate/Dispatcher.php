<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\DispatcherTemplate;

use Phalcon\Mvc\Dispatcher as MvcDispatcher;


/**
 * Class Dispatcher
 * @package App\Provider\DispatcherTemplate
 */
class Dispatcher extends MvcDispatcher {

    /**
     * Gets the name of the module with default
     *
     * @return string
     */
    public function getModuleNameWithDefault(): string {
        return $this->getModuleName() ?: container('app')->getDefaultModule();
    }

}
