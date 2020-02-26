<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Http\Response\Formatter;

use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\ViewInterface;


/**
 * Class AbstractFormatter
 * @package App\Library\Framework\Http\Response\Formatter
 */
abstract class AbstractFormatter implements FormatterInterface {

    /**
     * Returns the view service current
     *
     * @return ViewInterface
     */
    public function getView(): ViewInterface {
        return container('view');
    }

    /**
     * Returns the response service current
     *
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface {
        return container('response');
    }

}
