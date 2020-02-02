<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
return [
    App\Provider\Application\ServiceProvider::class,
    App\Provider\Cache\ServiceProvider::class,
    App\Provider\Config\ServiceProvider::class,
    App\Provider\Cookies\ServiceProvider::class,
    App\Provider\Database\ServiceProvider::class,
    App\Provider\Field\ServiceProvider::class,
    App\Provider\FileSystem\ServiceProvider::class,
    App\Provider\Logger\ServiceProvider::class,
    App\Provider\Router\ServiceProvider::class,
    App\Provider\Session\ServiceProvider::class,
    App\Provider\Timezone\ServiceProvider::class,
    App\Provider\Translator\ServiceProvider::class,
    App\Provider\UrlResolver\ServiceProvider::class,
    App\Provider\ViewCache\ServiceProvider::class,
    App\Provider\Volt\ServiceProvider::class,
];