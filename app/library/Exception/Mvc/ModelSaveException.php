<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Exception\Mvc;

use Exception;
use App\Library\Exception\AppExceptionInterface;


/**
 * Class ModelSaveException
 * @package App\Library\Exception\Mvc
 */
class ModelSaveException extends Exception implements AppExceptionInterface {}
