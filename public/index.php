<?php
/**
 * The entry point of the application
 *
 * @package   phalcon-skeleton
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/php-bops-example
 */
declare(strict_types=1);

use Bops\Bootstrap;
use Bops\Navigator\Adapter\Standard;

require_once __DIR__ . '/../vendor/autoload.php';


/** @noinspection PhpUnhandledExceptionInspection */
echo (new Bootstrap(new Standard(dirname(__DIR__))))->run();
