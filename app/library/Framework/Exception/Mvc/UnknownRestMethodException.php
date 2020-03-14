<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Exception\Mvc;

use App\Library\Framework\Exception\AppExceptionInterface;
use Exception;


/**
 * Class UnknownRestMethodException
 *
 * @package App\Library\Framework\Exception\Mvc
 */
class UnknownRestMethodException extends Exception implements AppExceptionInterface {}
