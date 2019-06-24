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
]));


Assert::type(HttpRequest::class, $request);
Assert::same('/test/index.php', $request->getScriptName());
Assert::same('/var/www/html/test/index.php', $request->getScriptFileName());
Assert::same('foo=bar&baz=bam', $request->getQueryString());
Assert::same('/test', (string) $request->getBasePath());
Assert::same('/test/some-route', (string) $request->getUri());
Assert::same('some-route', $request->getRoutePath());
Assert::same(HttpRequest::TIME_DEFAULT, $request->getRequestTime());
Assert::same(HttpRequest::GATEWAY_INTERFACE_DEFAULT, $request->getGatewayInterface());
Assert::same(HttpRequest::SCHEME_HTTPS, $request->getScheme());
Assert::true($request->isHttps());
Assert::same(HttpRequest::HOST_LOCAL, $request->getHost());
Assert::same(HttpRequest::HOST_IP_LOCAL, $request->getHostIP());
Assert::same(HttpRequest::PORT_HTTPS, $request->getPort());
Assert::same(HttpRequest::METHOD_POST, $request->getMethod());
Assert::same(HttpRequest::SERVER_SOFTWARE_APACHE, $request->getServerSoftware());
Assert::same(HttpRequest::ACCEPT_HTML, $request->getAccept());
Assert::same(HttpRequest::ACCEPT_LANGUAGE_DEFAULT, $request->getAcceptLanguage());
Assert::same(HttpRequest::ACCEPT_CHARSET_DEFAULT, $request->getAcceptCharset());
Assert::same(HttpRequest::ACCEPT_ENCODING_DEFAULT, $request->getAcceptEncoding());
Assert::same(HttpRequest::USER_AGENT_DEFAULT, $request->getUserAgent());
Assert::same(HttpRequest::REFERER_DEFAULT, $request->getReferer());
Assert::same(HttpRequest::REMOTE_IP_LOCAL, $request->getRemoteIP());
Assert::same(HttpRequest::REMOTE_PORT_DEFAULT, $request->getRemotePort());
Assert::false($request->isAjax());
