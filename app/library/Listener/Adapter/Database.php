<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Library\Listener\Adapter;

use Phalcon\Db\Adapter\Pdo;
use Phalcon\Events\Event;


/**
 * Class Database
 * @package App\Library\Listener
 */
final class Database {

    /**
     * Database queries listener
     *
     * @param Event $event
     * @param Pdo $connection
     * @return bool
     */
    final public function beforeQuery(Event $event, Pdo $connection): bool {
        $statement = $connection->getSQLStatement();
        $variables = $connection->getSqlVariables();

        $logger = container('logger', 'db');
        $logger->debug(sprintf("BeforeQuery:\nStatement: %s\nVariables:%s",
            $statement, join(', ', ($variables ?? []))
        ));

        return true;
    }

}
