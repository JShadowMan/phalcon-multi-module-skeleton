<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Xet;


if (!function_exists('array_any')) {
    /**
     * Return true when any element like boolean true in object, the
     * converter((bool) is default) is optional
     *
     * @param array $object
     * @param null $handler
     * @return bool
     */
    function array_any(array $object, $handler = null): bool {
        foreach ($object as $value) {
            if (is_callable($handler) && call_user_func($handler, $value)) {
                return true;
            } else {
                if ($value) {
                    return true;
                }
            }
        }

        return false;
    }
}

if (!function_exists('array_at')) {
    /**
     * Gets the value from parameter object and default when key not found in object
     *
     * @param array $object
     * @param string|array $paths
     * @param null $default
     * @param string $delimiter
     * @return array|mixed|null
     */
    function array_at(array $object, $paths, $default = null, string $delimiter = '.') {
        if (!is_array($paths)) {
            $paths = explode($delimiter, strval($paths));
        }

        $find = &$object;
        foreach ($paths as $index) {
            if (!isset($find[$index])) {
                return $default;
            }
            $find = &$find[$index];
        }

        return $find;
    }
}
