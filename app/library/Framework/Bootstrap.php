<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework;

use App\Provider\Application\Application;
use App\Provider\Environment\ServiceProvider as EnvironmentServiceProvider;
use App\Provider\ErrorHandler\ServiceProvider as ErrorHandlerServiceProvider;
use App\Provider\EventsManager\ServiceProvider as EventsManagerServiceProvider;
use App\Provider\ServiceProviderInstaller;
use App\Provider\ServiceProviderInterface;
use Phalcon\Di;
use Phalcon\Di\FactoryDefault;
use Phalcon\DiInterface;


/**
 * Class Bootstrap
 * @package App\Library\Framework
 */
final class Bootstrap {

    /**
     * Application instance
     *
     * @var Application
     */
    private $app;

    /**
     * Dependency injection manager
     *
     * @var DiInterface
     */
    private $di;

    /**
     * Application environment
     *
     * @var string
     */
    private $environment;

    /**
     * Bootstrap constructor.
     */
    final public function __construct() {
        $this->di = new FactoryDefault();
        Di::setDefault($this->di);
        $this->di->setShared('bootstrap', $this);

        $this->setupEnvironment();
        $this->setupServiceProvider(new ErrorHandlerServiceProvider($this->di));
        $this->setupServiceProvider(new EventsManagerServiceProvider($this->di));

        /** @noinspection PhpIncludeInspection */
        $providers = include config_path('providers.php');
        if (is_array($providers)) {
            $this->setupServiceProviders($providers);
        }
        $this->app = container('app');

        /** @noinspection PhpIncludeInspection */
        $services = include config_path('services.php');
        if (is_array($services)) {
            $this->setupServices($services);
        }
    }

    /**
     * Get the application environment
     *
     * @return string
     */
    final public function getEnvironment(): string {
        return $this->environment;
    }

    /**
     * Run the application
     *
     * @return $this
     */
    final public function run(): string {
        return $this->app->handle()->getContent();
    }

    /**
     * Setup the application environment
     */
    final private function setupEnvironment() {
        $this->environment = env('APP_ENV', 'development');
        return $this->setupServiceProvider(new EnvironmentServiceProvider($this->di));
    }

    /**
     * Initializing the service provider
     *
     * @param ServiceProviderInterface $provider
     * @return Bootstrap
     */
    final private function setupServiceProvider(ServiceProviderInterface $provider) {
        ServiceProviderInstaller::setup($provider);
        return $this;
    }

    /**
     * Initializing the service providers.
     *
     * @param array $providers
     * @return $this
     */
    final private function setupServiceProviders(array $providers) {
        foreach ($providers as $provider) {
            $this->setupServiceProvider(new $provider($this->di));
        }
        return $this;
    }

    /**
     * Initializing the services
     *
     * @param array $services
     * @return Bootstrap
     */
    final private function setupServices(array $services) {
        foreach ($services as $name => $service) {
            $this->di->setShared($name, $services);
        }
        return $this;
    }

}
