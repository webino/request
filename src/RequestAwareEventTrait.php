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
 * Trait RequestAwareEventTrait
 * @package request
 */
trait RequestAwareEventTrait
{
    /**
     * Returns PHP environment execution request.
     *
     * @return RequestInterface
     * @throws NotRequestException
     */
    public function getRequest(): RequestInterface
    {
        if (empty($this['request'])) {
            throw new NotRequestException;
        }
        return $this['request'];
    }

    /**
     * Set PHP environment execution request.
     *
     * @param RequestInterface $request
     */
    protected function setRequest(RequestInterface $request): void
    {
        $this['request'] = $request;
    }
}
