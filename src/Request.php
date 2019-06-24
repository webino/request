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
 * Class Request
 * @package request
 */
final class Request implements InstanceFactoryMethodInterface
{
    /**
     * @param CreateInstanceEventInterface $event
     * @return RequestInterface
     */
    public static function create(CreateInstanceEventInterface $event): RequestInterface
    {
        $container = $event->getContainer();

        if (php_sapi_name() === 'cli') {
            return $container->make(ConsoleRequest::class);
        }
        return $container->make(HttpRequest::class);
    }
}
