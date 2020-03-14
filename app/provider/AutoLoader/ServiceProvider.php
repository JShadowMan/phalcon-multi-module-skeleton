<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\AutoLoader;

use App\Provider\AbstractServiceProvider;
use Phalcon\Loader;


/**
 * Class ServiceProvider
 * @package App\Provider\AutoLoader
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'autoLoader';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function() {
            return (new Loader())->registerFiles([
                app_path('library/Framework/Xet/functions.php')
            ])->register();
        });
    }

    /**
     * @inheritDoc
     */
    public function initialize() {
        container($this->service_name);
    }

}
