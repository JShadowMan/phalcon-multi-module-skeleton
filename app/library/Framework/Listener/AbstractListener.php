<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Library\Framework\Listener;

use Phalcon\DiInterface;
use Phalcon\Mvc\User\Component;


/**
 * Class AbstractListener
 * @package App\Library\Framework\Listener
 */
abstract class AbstractListener extends Component {

    /**
     * AbstractListener constructor.
     * @param DiInterface|null $di
     */
    public function __construct(DiInterface $di = null) {
        $this->setDI($di ?? container());
    }

}
