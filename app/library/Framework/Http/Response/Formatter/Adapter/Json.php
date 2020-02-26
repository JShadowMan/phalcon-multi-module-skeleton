<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Http\Response\Formatter\Adapter;

use App\Library\Framework\Http\Response\Formatter\AbstractFormatter;
use Phalcon\Http\ResponseInterface;


/**
 * Class Json
 * @package App\Library\Framework\Http\Response\Formatter\Adapter
 */
class Json extends AbstractFormatter {

    /**
     * Make an success json response
     *
     * @param array $data
     * @param array $extra
     * @param string|null $code
     * @param string $message
     * @return ResponseInterface|mixed
     */
    public function success(array $data, ?array $extra = null, ?string $code = null, string $message = 'success') {
        return $this->output($code, $message, $data, $extra);
    }

    /**
     * Make an error json response
     *
     * @param string $code
     * @param string $message
     * @param array|null $data
     * @param array|null $extra
     * @return ResponseInterface
     */
    public function error(string $code, string $message, ?array $data = null, ?array $extra = null) {
        return $this->output($code, $message, $data, $extra);
    }

    /**
     * Make an json response
     *
     * @param string|null $code
     * @param string $message
     * @param array|null $data
     * @param array|null $extra
     * @return ResponseInterface
     */
    protected function output(?string $code, string $message, ?array $data, ?array $extra) {
        $this->getView()->setVars([
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'extra' => $extra
        ]);
        return $this->getResponse()->setContentType('application/json; charset=utf-8');
    }

}
