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
 * Interface HttpRequestAwareInterface
 * @package request
 */
interface HttpRequestAwareInterface
{
    /**
     * Returns PHP environment execution request.
     *
     * @return HttpRequestInterface
     * @throws NotHttpRequestException
     */
    public function getHttpRequest(): HttpRequestInterface;
}
