<?php
/**
 * Webino™ (http://webino.sk)
 *
 * @noinspection PhpUnhandledExceptionInspection
 * @interpreter php
 *
 * @link        https://github.com/webino/request
 * @copyright   Copyright (c) 2019 Webino, s.r.o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

namespace Webino;

use Tester\Assert;
use Tester\Environment;

Environment::setup();


$container = new InstanceContainer;


/** @var RequestInterface $request */
$request = $container->get(RequestInterface::class);


Assert::type(RequestInterface::class, $request);
Assert::type(ConsoleRequest::class, $request);
