<?php
/**
 * The entry point of the application
 *
 * @package   phalcon-skeleton
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
declare(strict_types=1);

use App\Library\Framework\Bootstrap;


// register the application bootstrap
require_once __DIR__ . '/../app/bootstrap.php';

// execute bootstrap and output response
echo (new Bootstrap())->run();
