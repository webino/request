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
 * Trait HttpRequestAwareEventTrait
 * @package request
 */
trait HttpRequestAwareEventTrait
{
    /**
     * Returns PHP environment execution request.
     *
     * @return RequestInterface
     */
    abstract public function getRequest(): RequestInterface;

    /**
     * Returns HTTP request.
     *
     * @return HttpRequestInterface
     * @throws NotHttpRequestException
     */
    public function getHttpRequest(): HttpRequestInterface
    {
        $request = $this->getRequest();
        if ($request instanceof HttpRequestInterface) {
            return $request;
        }

        throw new NotHttpRequestException;
    }
}
