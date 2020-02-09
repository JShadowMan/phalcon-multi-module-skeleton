<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Exception\Application;

use App\Library\Exception\AppExceptionInterface;
use Exception;


/**
 * Class ModuleNameReservedException
 * @package App\Library\Exception\Application
 */
class ModuleNameReservedException extends Exception implements AppExceptionInterface {}
