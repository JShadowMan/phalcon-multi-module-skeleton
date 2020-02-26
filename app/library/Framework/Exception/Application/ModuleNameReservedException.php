<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Exception\Application;

use App\Library\Framework\Exception\AppExceptionInterface;
use Exception;


/**
 * Class ModuleNameReservedException
 * @package App\Library\Framework\Exception\Application
 */
class ModuleNameReservedException extends Exception implements AppExceptionInterface {}
