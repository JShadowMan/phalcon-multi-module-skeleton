<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Translator;

use App\Provider\AbstractServiceProvider;


/**
 * Class ServiceProvider
 * @package App\Provider\Translator
 */
final class ServiceProvider extends AbstractServiceProvider {

    /**
     * Name of the service
     *
     * @var string
     */
    protected $service_name = 'translator';

    /**
     * @inheritDoc
     */
    final public function register() {
        $this->di->set($this->service_name, function(string $language = '', ...$args) {
            $translator = Factory::factory($language);
            if (empty($args)) {
                return $translator;
            }
            return $translator->query(...$args);
        });
    }

}
