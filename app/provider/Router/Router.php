<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Router;

use App\Library\Feature\Version;
use Phalcon\Mvc\Router as MvcRouter;


/**
 * Class Router
 * @package App\Provider\Router
 */
final class Router extends MvcRouter {

    /**
     * Router constructor.
     * @param bool $defaultRoutes
     */
    public function __construct($defaultRoutes = true) {
        parent::__construct($defaultRoutes);

        $this->add('/:module/:controller/:action/:params', [
            'module' => 1,
            'controller' => 2,
            'action' => 3,
            'params' => 4
        ]);
    }

    /**
     * Gets uri from request override by versionFeature
     *
     * @see Router::getRewriteUri()
     * @return string
     */
    public function getVersionFeatureUri(): string {
        $uri = $this->getRewriteUri();
        if (preg_match('/^\/v(?<version>\d+)(?<uri>.*)/', $uri, $matches)) {
            $trimmed_uri = $matches['uri'] ?: '/';
            $module = container('app')->getDefaultModule();
            if (preg_match('/\/(?<module>\w+)\/.*/', $trimmed_uri, $paths)) {
                $module = $paths['module'];
            }

            /* @var Version $feature */
            $feature = container('versionFeature');
            if ($feature->check($module)) {
                $feature->setNumber((int)$matches['version']);
                return $trimmed_uri;
            }
        }

        return $uri;
    }

}
