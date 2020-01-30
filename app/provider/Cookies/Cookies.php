<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/lsalio/phalcon-skeleton
 */
namespace App\Provider\Cookies;

use Phalcon\Http\Response\Cookies as HttpCookies;


/**
 * Class Cookies
 * @package App\Provider\Cookies
 */
class Cookies extends HttpCookies {

    /**
     * Adds a httpOnly cookie
     *
     * @param string $name
     * @param string $value
     * @param string|null $path
     * @param string|null $domain
     * @return HttpCookies
     */
    public function add(string $name, string $value, ?string $path = null, ?string $domain = null) {
        return $this->set($name, $value, 0, $path, false, $domain, true);
    }

}
