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
 * Interface ConsoleRequestInterface
 * @package request
 */
interface ConsoleRequestInterface extends RequestInterface
{
    const COMMAND = 'CONSOLE_COMMAND';

    /**
     * Returns console command.
     *
     * @return string
     */
    public function getCommand(): string;
}
