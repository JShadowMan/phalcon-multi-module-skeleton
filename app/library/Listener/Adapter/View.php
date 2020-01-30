<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Listener\Adapter;

use App\Library\Listener\AbstractListener;
use Phalcon\Events\Event;
use Phalcon\Mvc\ViewBaseInterface;


/**
 * Class View
 * @package App\Library\Listener\Adapter
 */
final class View extends AbstractListener {

    /**
     * Notify about not found views
     *
     * @noinspection PhpUnused
     * @param Event $event
     * @param ViewBaseInterface $view
     * @param string $engine_path
     *
     */
    final public function notFoundView(Event $event, ViewBaseInterface $view, string $engine_path) {
        // @TODO logger on not found
        if ($event->isCancelable()) {
            $event->stop();
        }
    }

}
