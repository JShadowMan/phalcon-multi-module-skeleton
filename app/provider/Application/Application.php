<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Application;

use App\Library\Exception\Application\ModuleNameReservedException;
use App\Library\Listener\Adapter\Application as ApplicationListener;
use Phalcon\DiInterface;
use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Application as MvcApplication;


/**
 * Class Application
 * @package App\Provider\Application
 */
class Application extends MvcApplication {

    /**
     * The flag of version feature
     *
     * @var bool
     */
    protected $version_feature;

    /**
     * Initializing the modules for application
     *
     * @param DiInterface|null $di
     * @throws ModuleNameReservedException
     */
    public function __construct(DiInterface $di = null) {
        parent::__construct(($di ?? container()));

        $this->setEventsManager(container('eventsManager'));
        container('eventsManager')->attach('application', new ApplicationListener());

        $this->setupModules();
    }

    /**
     * @param null $uri
     * @return ResponseInterface
     */
    public function handle($uri = null) {
        if (empty($uri)) {
            $uri = container('router')->getRewriteUri();
        }

        if ($this->version_feature) {
            if (preg_match('/^\/v(?<version>\d+)(?<uri>.*)/', $uri, $matches)) {
                $uri = $matches['uri'] ?: '/';
                putenv("SERVICE_VERSION={$matches['version']}");
            }
        }

        return parent::handle($uri);
    }

    /**
     * Setups the multi modules supported, and register all modules
     * to the application
     *
     * @throws ModuleNameReservedException
     */
    private function setupModules() {
        $this->registerModules($this->getModuleDefinitions());
        $this->setDefaultModule(container('config')->modules->default);
    }

    /**
     * Returns the array of the module definitions and raise an error
     * when has a module name like v(digit) with version feature enabled
     *
     * @return array
     * @throws ModuleNameReservedException
     */
    private function getModuleDefinitions(): array {
        $this->version_feature = env('VERSION_FEATURE');
        $modules = container('config')->modules->classes->toArray();
        if (is_bool($this->version_feature)) {
            return $modules;
        }

        $this->version_feature = false;
        foreach ($modules as $module) {
            if (!$this->version_feature && isset($module['metadata']) && is_array($module['metadata'])) {
                if (isset($module['metadata']['versionFeature']) && $module['metadata']['versionFeature']) {
                    $this->version_feature = true;
                }
            }
        }

        putenv(sprintf('VERSION_FEATURE=%s', $this->version_feature ? 'true' : 'false'));
        if ($this->version_feature) {
            foreach (array_keys($modules) as $name) {
                if (preg_match('/^v?\d+/', $name)) {
                    throw new ModuleNameReservedException("The name of the module \"{$name}\" has reversed");
                }
            }
        }

        return $modules;
    }

}
