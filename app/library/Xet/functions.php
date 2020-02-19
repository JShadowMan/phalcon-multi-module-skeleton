<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Xet;


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
