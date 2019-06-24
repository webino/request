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
 * Interface HttpRequestInterface
 * @package request
 */
interface HttpRequestInterface extends RequestInterface
{
    const SCRIPT_NAME = 'SCRIPT_NAME';

    const SCRIPT_NAME_DEFAULT = '/index.php';

    const GATEWAY_INTERFACE = 'GATEWAY_INTERFACE';

    const GATEWAY_INTERFACE_DEFAULT = 'CGI/1.1';

    const SERVER_SOFTWARE = 'SERVER_SOFTWARE';

    const SERVER_SOFTWARE_APACHE = 'Apache';

    const SERVER_SOFTWARE_NGINX = 'nginx';

    const HOST = 'HTTP_HOST';

    const HOST_LOCAL = 'localhost';

    const HOST_IP = 'SERVER_ADDR';

    const HOST_IP_LOCAL = '127.0.0.1';

    const URI = 'REQUEST_URI';

    const URI_DEFAULT = '/';

    const METHOD = 'REQUEST_METHOD';

    const METHOD_GET = 'GET';

    const METHOD_POST = 'POST';

    const SCHEME = 'REQUEST_SCHEME';

    const SCHEME_HTTP = 'http';

    const SCHEME_HTTPS = 'https';

    const PORT = 'SERVER_PORT';

    const PORT_HTTP = '80';

    const PORT_HTTPS = '443';

    const QUERY_STRING = 'QUERY_STRING';

    const QUERY_STRING_DEFAULT = '';

    const ACCEPT = 'HTTP_ACCEPT';

    const ACCEPT_HTML = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';

    const ACCEPT_LANGUAGE = 'HTTP_ACCEPT_LANGUAGE';

    const ACCEPT_LANGUAGE_DEFAULT = 'en-us,en;q=0.5';

    const ACCEPT_CHARSET = 'HTTP_ACCEPT_CHARSET';

    const ACCEPT_CHARSET_DEFAULT = 'ISO-8859-1,utf-8;q=0.7,*;q=0.7';

    const ACCEPT_ENCODING = 'HTTP_ACCEPT_ENCODING';

    const ACCEPT_ENCODING_DEFAULT = 'ISO-8859-1,utf-8;q=0.7,*;q=0.7';

    const USER_AGENT = 'HTTP_USER_AGENT';

    const USER_AGENT_DEFAULT = 'Webino';

    const REFERER = 'HTTP_REFERER';

    const REFERER_DEFAULT = 'http://localhost';

    const REMOTE_IP = 'REMOTE_ADDR';

    const REMOTE_IP_LOCAL = '127.0.0.1';

    const REMOTE_PORT = 'REMOTE_PORT';

    const REMOTE_PORT_DEFAULT = '12345';

    const REQUESTED_WITH = 'HTTP_X_REQUESTED_WITH';

    const REQUESTED_WITH_AJAX = 'XMLHttpRequest';

    /**
     * Returns route path.
     *
     * @return string
     */
    public function getRoutePath(): string;

    /**
     * Returns executed script name.
     *
     * @return string
     */
    public function getScriptName(): string;

    /**
     * Returns HTTP request method.
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Returns HTTP host name.
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Returns HTTP host IP address.
     *
     * @return string
     */
    public function getHostIP(): string;

    /**
     * Returns HTTP request scheme.
     *
     * @return string
     */
    public function getScheme(): string;

    /**
     * Returns true when request scheme is HTTPS.
     *
     * @return bool
     */
    public function isHttps(): bool;

    /**
     * Returns HTTP request port.
     *
     * @return string
     */
    public function getPort(): string;

    /**
     * Returns HTTP request query string.
     *
     * @return string
     */
    public function getQueryString(): string;

    /**
     * Returns HTTP root.
     *
     * @return BasePathInterface
     */
    public function getBasePath(): BasePathInterface;

    /**
     * Returns request URI.
     *
     * @return RequestUriInterface
     */
    public function getUri(): RequestUriInterface;

    /**
     * Returns server gateway interface identifier.
     *
     * @return string
     */
    public function getGatewayInterface(): string;

    /**
     * Returns server software identifier.
     *
     * @return string
     */
    public function getServerSoftware(): string;

    /**
     * Returns HTTP accept header value.
     *
     * @return string
     */
    public function getAccept(): string;

    /**
     * Returns HTTP accept language header value.
     *
     * @return string
     */
    public function getAcceptLanguage(): string;

    /**
     * Returns HTTP accept charset header value.
     *
     * @return string
     */
    public function getAcceptCharset(): string;

    /**
     * Returns HTTP accept encoding header value.
     *
     * @return string
     */
    public function getAcceptEncoding(): string;

    /**
     * Returns HTTP request user agent.
     *
     * @return string
     */
    public function getUserAgent(): string;

    /**
     * Returns HTTP referer header value.
     *
     * @return string
     */
    public function getReferer(): string;

    /**
     * Returns HTTP remote IP address.
     *
     * @return string
     */
    public function getRemoteIP(): string;

    /**
     * Returns HTTP remote port.
     *
     * @return string
     */
    public function getRemotePort(): string;

    /**
     * Returns true when request was made by Ajax.
     *
     * @return bool
     */
    public function isAjax(): bool;
}
