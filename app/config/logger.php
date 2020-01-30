<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
return [
    'root'      => storage_path('log'),
    'format'    => env('LOGGER_FORMAT', "%date% - %type% \t: %message%"),
    'date'      => env('LOGGER_DATE', 'Y-m-d H:i:s'),
    'level'     => env('LOGGER_LEVEL', 'INFO'),
    'filename'  => env('LOGGER_FILENAME', 'app'),
    'rotate'    => env('LOGGER_ROTATE', true)
];
