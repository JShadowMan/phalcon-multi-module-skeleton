<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\EventsManager;

use App\Provider\AbstractServiceProvider;
use Phalcon\Events\Manager as EventsManager;


/**
 * Class ServiceProvider
 * @package App\Provider\EventsManager
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'eventsManager';

    /**
     * @inheritDoc
     */
    final public function register() {
        $this->di->setShared($this->service_name, function() {
            $manager = new EventsManager();
            $manager->enablePriorities(true);

            return $manager;
        });
    }

}
