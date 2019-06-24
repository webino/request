<?php
/**
 * Webino™ (http://webino.sk)
 *
 * @link        https://github.com/webino/request
 * @copyright   Copyright (c) 2019 Webino, s.r.o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

namespace Webino;

/**
 * Interface RequestUriInterface
 * @package request
 */
interface RequestUriInterface
{
    /**
     * Returns HTTP request URI.
     *
     * @return string
     */
    public function __toString(): string;
}
