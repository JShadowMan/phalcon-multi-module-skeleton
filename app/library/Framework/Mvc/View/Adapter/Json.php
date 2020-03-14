<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Mvc\View\Adapter;

use App\Library\Framework\Mvc\View\AbstractView;
use Phalcon\Mvc\View;


/**
 * Class Json
 * @package App\Library\Framework\Mvc\View\Adapter
 */
class Json extends AbstractView {

    /**
     * @var int|null
     */
    protected $flags = null;

    /**
     * @var array
     */
    protected $format = array();

    /**
     * Load config
     *
     * @param array $config
     * @return $this
     */
    public function loadConfig(array $config) {
        if (isset($config['jsonFlags'])) {
            $this->flags = $config['jsonFlags'];
        }
        if (isset($config['jsonFormat']) && is_array($config['jsonFormat'])) {
            $this->format = $config['jsonFormat'];
        }
        return $this;
    }

    /**
     * Do nothing on json view
     *
     * @param string $controllerName
     * @param string $actionName
     * @param null $params
     * @return bool|View|void
     */
    public function render($controllerName, $actionName, $params = null) {}

    /**
     * Build data and return it
     *
     * @return string|void
     */
    public function getContent() {
        $object = [];
        foreach ($this->format as $name => $key) {
            $object[$key] = $this->getVar($name);
        }
        return json_encode($object, $this->flags);
    }

}
