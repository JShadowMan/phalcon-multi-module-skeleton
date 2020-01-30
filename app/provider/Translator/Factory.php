<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Translator;


use Phalcon\Translate\Adapter;

/**
 * Class Factory
 * @package App\Provider\Translator
 */
class Factory {

    /**
     * @var Adapter[]
     */
    protected static $translators = [];

    /**
     * Lists of the languages supported
     *
     * @var array
     */
    protected static $languages = ['zh', 'en'];

    /**
     * Creates the translator for a language
     *
     * @param string $language
     * @return Adapter
     */
    public static function factory(string $language = ''): Adapter {
        $language = self::extraLanguage($language);
        if (!isset(static::$translators[$language])) {
            /** @noinspection PhpIncludeInspection */
            static::$translators[$language] = new Adapter\NativeArray([
                'content' => include config_path("locale/{$language}.php")
            ]);
        }
        return static::$translators[$language];
    }

    /**
     *
     *
     * @param string $language
     * @return string
     */
    private static function extraLanguage(string $language): string {
        if (strpos($language, '-') !== false) {
            return current(explode('-', $language));
        }

        if (!empty($language) && in_array($language, static::$languages)) {
            return $language;
        }
        return container('config')->locale->default;
    }

}
