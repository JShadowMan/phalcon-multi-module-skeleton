<?php
/**
 * autoloader
 *
 * @package   PMms
 * @author    Jayson Wang <shadowman@shellboot.com>
 * @copyright Copyright (C) 2016-2018 Jayson Wang
 */
namespace PMms\Config;


use Phalcon\Di;
use Phalcon\Loader;


/* dependency management */
$di = Di::getDefault();

/* configure service */
$config = $di->get('config');

/* autoload collector */
$loader = new Loader();

/* register namespace to loader */
$loader->registerNamespaces(array(
    /* common libraries and plugins */
    'PMms\Libraries' => $config->application->libraries_root,
    'PMms\Plugins' => $config->application->plugins_root,
    /* common controllers and models */
    'PMms\Controllers' => $config->application->controllers_root,
    'PMms\Models' => $config->application->models_root,
    /* frontend controllers and models */
    'PMms\Frontend\Controllers' => $config->frontend->controllers_root,
    'PMms\Frontend\Models' => $config->frontend->models_root,
    /* backend controllers and models */
    'PMms\Backend\Controllers' => $config->backend->controllers_root,
    'PMms\Backend\Models' => $config->backend->models_root
));

/* create an autoloader */
$loader->register();
