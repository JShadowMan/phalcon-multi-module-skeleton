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
use Phalcon\Db\Adapter\Pdo;
use Phalcon\Events\Event;


/**
 * Class Database
 * @package App\Library\Framework\Listener\Adapter
 */
class Database extends AbstractListener {

    /**
     * Database queries listener
     *
     * @param Event $event
     * @param Pdo $connection
     * @return bool
     */
    public function beforeQuery(Event $event, Pdo $connection): bool {
        $statement = $connection->getSQLStatement();
        $variables = $connection->getSqlVariables();

        $logger = container('logger', 'db');
        $logger->debug(sprintf("BeforeQuery:\nStatement: %s\nVariables:%s",
            $statement, join(', ', ($variables ?? []))
        ));

        return true;
    }

}
