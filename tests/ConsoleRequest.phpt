<?php
/**
 * Webino™ (http://webino.sk)
 *
 * @noinspection PhpUnhandledExceptionInspection
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


/** @var ConsoleRequest $request */
$request = $container->make(ConsoleRequest::class, ConsoleRequest::defaults([
    ConsoleRequest::COMMAND => 'foo --bar baz',
    ConsoleRequest::SCRIPT_FILENAME => '/var/www/html/test/index.php',
]));


Assert::type(ConsoleRequest::class, $request);
Assert::same(ConsoleRequest::TIME_DEFAULT, $request->getRequestTime());
Assert::same('foo --bar baz', $request->getCommand());
Assert::same('/var/www/html/test/index.php', $request->getScriptFileName());
