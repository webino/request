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
 * Interface RequestInterface
 * @package request
 */
interface RequestInterface extends \Traversable, \IteratorAggregate, \ArrayAccess
{
    const TIME = 'REQUEST_TIME_FLOAT';

    const TIME_DEFAULT = 0.0;

    const SCRIPT_FILENAME = 'SCRIPT_FILENAME';

    const SCRIPT_FILENAME_DEFAULT = '/var/www/index.php';

    /**
     * Returns HTTP request time.
     *
     * @return float
     */
    public function getRequestTime(): float;

    /**
     * Returns executed script filename.
     *
     * @return string
     */
    public function getScriptFileName(): string;
}
