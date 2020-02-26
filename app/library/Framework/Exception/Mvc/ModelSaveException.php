<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Exception\Mvc;

use Exception;
use App\Library\Framework\Exception\AppExceptionInterface;


/**
 * Class ModelSaveException
 * @package App\Library\Framework\Exception\Mvc
 */
class ModelSaveException extends Exception implements AppExceptionInterface {}
