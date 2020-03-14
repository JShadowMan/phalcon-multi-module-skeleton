<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\ViewDefault;

use App\Provider\AbstractServiceProvider;
use Phalcon\Mvc\View;


/**
 * Class ServiceProvider
 * @package App\Provider\ViewDefault
 */
class ServiceProvider extends AbstractServiceProvider {

    /**
     * The name of the service
     *
     * @var string
     */
    protected $service_name = 'view';

    /**
     * @inheritDoc
     */
    public function register() {
        $this->di->setShared($this->service_name, function() {
            /* @var $view View */
            $view = container('viewTemplate', /* empty config */[]);
            $view->setContent('');
            return $view;
        });
    }

    /**
     * @inheritDoc
     */
    public function initialize() {
        container($this->service_name);
    }

}
