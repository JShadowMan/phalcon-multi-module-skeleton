<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\Volt;

use App\Provider\AbstractServiceProvider;
use Phalcon\DiInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\ViewBaseInterface;


/**
 * Class ServiceProvider
 * @package App\Provider\Volt
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'volt';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->set($this->service_name, function(ViewBaseInterface $view, DiInterface $di = null) {
            $volt = new Volt($view, $di ?? container());

            $volt->setOptions([
                'compileAlways' => env('development') || env('APP_DEBUG', false),
                'compiledPath' => function(string $path): string {
                    $relative_path = trim(mb_substr($path, mb_strlen(dirname(app_path()))), '\\/');
                    $basename = basename(str_replace(['\\', '/'], '_', $relative_path), '.volt');

                    $cache_dir = cache_path('volt');
                    if (!is_dir($cache_dir)) {
                        @mkdir($cache_dir, 0755, true);
                    }

                    return $cache_dir . DIRECTORY_SEPARATOR . $basename . '.php';
                },
            ]);
            $volt->getCompiler()->addExtension(new Functions($volt->getCompiler()));

            return $volt;
        });
    }

}
