<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Exception\Runtime;

use App\Library\Framework\Exception\AppExceptionInterface;
use Exception;


/**
 * Class InvalidParameterException
 * @package App\Library\Framework\Exception\Runtime
 */
class InvalidParameterException extends Exception implements AppExceptionInterface {}
