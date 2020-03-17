<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\FileSystem;

use App\Provider\AbstractServiceProvider;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;


/**
 * Class ServiceProvider
 * @package App\Provider\FileSystem
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'filesystem';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function(?string $root = null) {
            if (!$root) {
                $root = APP_DOCUMENT_ROOT;
            }
            return new Filesystem(new Local($root));
        });
    }

}
