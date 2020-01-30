<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Field\Store;


/**
 * Class AbstractStore
 * @package App\Provider\Field\Store
 */
abstract class AbstractStore implements StoreInterface {

    /**
     * @inheritdoc
     *
     * @param string $key
     * @param $value
     * @return StoreInterface
     */
    public function set(string $key, $value): StoreInterface {
        switch (true) {
            case is_string($value):
                return $this->setString($key, $value);
            case is_integer($value):
                return $this->setInteger($key, $value);
            case is_float($value):
                return $this->setFloat($key, $value);
            case is_bool($value):
                return $this->setBoolean($key, $value);
            default:
                return $this->setSerialized($key, $value);
        }
    }

}
