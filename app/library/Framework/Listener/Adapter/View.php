<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Framework\Listener\Adapter;

use App\Library\Framework\Listener\AbstractListener;
use Phalcon\Events\Event;
use Phalcon\Mvc\ViewBaseInterface;


/**
 * Class View
 * @package App\Library\Framework\Listener\Adapter
 */
class View extends AbstractListener {

    /**
     * Notify about not found views
     *
     * @noinspection PhpUnused
     * @param Event $event
     * @param ViewBaseInterface $view
     * @param string $engine_path
     *
     */
    public function notFoundView(Event $event, ViewBaseInterface $view, string $engine_path) {
        if ($event->isCancelable()) {
            $event->stop();
        }
    }

}
