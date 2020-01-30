<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\ErrorHandler;

use App\Library\Exception\Handler\ErrorPageHandler;
use App\Library\Exception\Handler\LoggerHandler;
use App\Provider\AbstractServiceProvider;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;


/**
 * Class ServiceProvider
 * @package App\Provider\ErrorHandler
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'errorHandler';

    /**
     * @inheritDoc
     */
    final public function register() {
        $this->di->setShared("{$this->service_name}.loggerHandler", LoggerHandler::class);
        $this->di->setShared("{$this->service_name}.prettyPageHandler", PrettyPageHandler::class);
        $this->di->setShared("{$this->service_name}.errorPageHandler", ErrorPageHandler::class);

        $service_name = $this->service_name;
        $this->di->setShared($this->service_name, function() use ($service_name) {
            $run = new Run();
            $run->appendHandler(container("{$service_name}.loggerHandler"));

            if (env('APP_DEBUG', false)) {
                $run->appendHandler(container("{$service_name}.prettyPageHandler"));
            } else {
                $run->appendHandler(container("{$service_name}.errorPageHandler"));
            }
            return $run;
        });
    }

    /**
     * @inheritDoc
     */
    final public function initialize() {
        /* @var $run Run */
        $run = container($this->service_name);
        $run->register();
    }

}
