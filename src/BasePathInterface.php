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
 * Interface BasePathInterface
 * @package request
 */
interface BasePathInterface
{
    /**
     * Returns HTTP root.
     *
     * @return string
     */
    public function __toString(): string;
}
