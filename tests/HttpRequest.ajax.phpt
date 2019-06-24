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

use Tester\Assert;
use Webino\HttpRequest;
use Webino\InstanceContainer;

Tester\Environment::setup();


$container = new InstanceContainer;


/** @var HttpRequest $request */
$request = $container->make(HttpRequest::class, HttpRequest::defaults([
    HttpRequest::QUERY_STRING => 'foo=bar&baz=bam',
    HttpRequest::SCRIPT_NAME => '/test/index.php',
    HttpRequest::SCRIPT_FILENAME => '/var/www/html/test/index.php',
    HttpRequest::URI => '/test/some-route',
    HttpRequest::REQUESTED_WITH => HttpRequest::REQUESTED_WITH_AJAX,
]));


Assert::type(HttpRequest::class, $request);
Assert::true($request->isAjax());
