<?php
/**
 * The entry point of the application
 *
 * @package   phalcon-skelton
 * @author    Jayson Wang <jayson@laboys.org>
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   BSD 3-Clause
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
declare(strict_types=1);

use App\Library\Bootstrap;


// register the application bootstrap
require_once __DIR__ . '/../app/bootstrap.php';

// execute bootstrap and output response
echo (new Bootstrap())->run();
