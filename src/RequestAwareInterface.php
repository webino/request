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
 * Interface RequestAwareInterface
 * @package request
 */
interface RequestAwareInterface
{
    /**
     * Returns PHP environment execution request.
     *
     * @return RequestInterface
     * @throws NotRequestException
     */
    public function getRequest(): RequestInterface;
}
