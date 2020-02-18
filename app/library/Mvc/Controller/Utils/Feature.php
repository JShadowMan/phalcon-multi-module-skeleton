<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Mvc\Controller\Utils;

use App\Library\Listener\Adapter\Dispatcher;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Throwable;


/**
 * Class Feature
 * @package App\Library\Mvc\Controller\Utils
 */
class Feature {

    /**
     * Returns the namespace with version suffix when feature enabled
     *
     * @param string $namespace
     * @return string
     */
    public static function versionOf(string $namespace): string {
        if (env('VERSION_FEATURE')) {
            $version = env('SERVICE_VERSION', '1');
            $namespace = sprintf('%s\V%d', rtrim($namespace, '\\'), $version ?: '1');
        }
        return $namespace;
    }

    /**
     * Returns a boolean value means the exception is subclass of controller cannot load
     *
     * @param Throwable $exception
     * @return bool
     */
    public static function isCannotLoadedException(Throwable $exception): bool {
        return $exception->getCode() === MvcDispatcher::EXCEPTION_HANDLER_NOT_FOUND;
    }

    /**
     * Returns a namespace of controller on version fallback
     *
     * @param string $namespace
     * @return string
     */
    public static function fallbackVersion(string $namespace): string {
        return preg_replace('/(.*)(\\\V\d+)$/', '$1', $namespace);
    }

}
