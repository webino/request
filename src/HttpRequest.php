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
 * Class HttpRequest
 * @package request
 */
class HttpRequest extends AbstractRequest implements
    HttpRequestInterface,
    InstanceFactoryMethodInterface
{
    /**
     * @var BasePathInterface
     */
    protected $basePath;

    /**
     * @var RequestUri
     */
    protected $requestUri;

    /**
     * @param CreateInstanceEventInterface $event
     * @return HttpRequest
     */
    public static function create(CreateInstanceEventInterface $event): HttpRequest
    {
        $container = $event->getContainer();
        $params = $event->getParameters();
        $request = new static($params[0] ?? []);
        $requestUri = $container->make(RequestUriInterface::class, $request);
        $basePath = $container->make(BasePathInterface::class, $request, $requestUri);
        $request->setUri($requestUri);
        $request->setBasePath($basePath);
        return $request;
    }

    /**
     * Returns request defaults
     *
     * @param array $overrides
     * @return array
     */
    public static function defaults(array $overrides): array
    {
        return $overrides + [
            HttpRequest::TIME => HttpRequest::TIME_DEFAULT,
            HttpRequest::SCRIPT_NAME => HttpRequest::SCRIPT_NAME_DEFAULT,
            HttpRequest::SCRIPT_FILENAME => HttpRequest::SCRIPT_FILENAME_DEFAULT,
            HttpRequest::GATEWAY_INTERFACE => HttpRequest::GATEWAY_INTERFACE_DEFAULT,
            HttpRequest::SCHEME => HttpRequest::SCHEME_HTTPS,
            HttpRequest::HOST => HttpRequest::HOST_LOCAL,
            HttpRequest::HOST_IP => HttpRequest::HOST_IP_LOCAL,
            HttpRequest::PORT => HttpRequest::PORT_HTTPS,
            HttpRequest::METHOD => HttpRequest::METHOD_POST,
            HttpRequest::URI => HttpRequest::URI_DEFAULT,
            HttpRequest::QUERY_STRING => HttpRequest::QUERY_STRING_DEFAULT,
            HttpRequest::SERVER_SOFTWARE => HttpRequest::SERVER_SOFTWARE_APACHE,
            HttpRequest::ACCEPT => HttpRequest::ACCEPT_HTML,
            HttpRequest::ACCEPT_LANGUAGE => HttpRequest::ACCEPT_LANGUAGE_DEFAULT,
            HttpRequest::ACCEPT_CHARSET => HttpRequest::ACCEPT_CHARSET_DEFAULT,
            HttpRequest::ACCEPT_ENCODING => HttpRequest::ACCEPT_ENCODING_DEFAULT,
            HttpRequest::USER_AGENT => HttpRequest::USER_AGENT_DEFAULT,
            HttpRequest::REFERER => HttpRequest::REFERER_DEFAULT,
            HttpRequest::REMOTE_IP => HttpRequest::REMOTE_IP_LOCAL,
            HttpRequest::REMOTE_PORT => HttpRequest::REMOTE_PORT_DEFAULT,
        ];
    }

    /**
     * Returns HTTP root
     *
     * @return BasePathInterface
     */
    public function getBasePath(): BasePathInterface
    {
        return $this->basePath;
    }

    /**
     * @param BasePathInterface $basePath
     * @return void
     */
    protected function setBasePath(BasePathInterface $basePath): void
    {
        $this->basePath = $basePath;
    }

    /**
     * Returns request URI
     *
     * @return RequestUriInterface
     */
    public function getUri(): RequestUriInterface
    {
        return $this->requestUri;
    }

    /**
     * Set request URI
     *
     * @param RequestUri $requestUri
     * @return void
     */
    protected function setUri(RequestUri $requestUri): void
    {
        $this->requestUri = $requestUri;
    }

    /**
     * Returns request route path
     *
     * @return string
     */
    public function getRoutePath(): string
    {
        $basePath = (string) $this->getBasePath();
        $requestUri = (string) $this->getUri();
        $requestQuery = trim(substr($requestUri, strlen($basePath)), '/?&');
        return explode('&', $requestQuery ?? '', 2)[0] ?? '';
    }

    /**
     * Returns executed script name.
     *
     * @return string
     */
    public function getScriptName(): string
    {
        return $this[$this::SCRIPT_NAME] ?? '';
    }

    /**
     * Returns server gateway interface
     *
     * @return string
     */
    public function getGatewayInterface(): string
    {
        return $this[$this::GATEWAY_INTERFACE] ?? '';
    }

    /**
     * Returns HTTP request method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return strtoupper($this[$this::METHOD]);
    }

    /**
     * Returns HTTP host name
     *
     * @return string
     */
    public function getHost(): string
    {
        return strtolower($this['SERVER_NAME'] ?? explode(':', $this[$this::HOST] ?? '')[0]);
    }

    /**
     * Returns HTTP host IP address
     *
     * @return string
     */
    public function getHostIP(): string
    {
        return $this[$this::HOST_IP] ?? '';
    }

    /**
     * Returns HTTP request scheme
     *
     * @return string
     */
    public function getScheme(): string
    {
        if (empty($this[$this::SCHEME])) {
            $isHttps = 0 === strpos($this::SCHEME_HTTPS, strtolower($this['SERVER_PROTOCOL']));
            return strtolower($isHttps ? $this::SCHEME_HTTPS : $this::SCHEME_HTTP);
        }
        return strtolower($this[$this::SCHEME]);
    }

    /**
     * Returns true when request scheme is HTTPS
     *
     * @return bool
     */
    public function isHttps(): bool
    {
        return $this->getScheme() === $this::SCHEME_HTTPS;
    }

    /**
     * Returns HTTP request port
     *
     * @return string
     */
    public function getPort(): string
    {
        return $this[$this::PORT] ?? $this::PORT_HTTP;
    }

    /**
     * Returns HTTP request query string
     *
     * @return string
     */
    public function getQueryString(): string
    {
        return $this[$this::QUERY_STRING] ?? '';
    }

    /**
     * Returns server software identifier
     *
     * @return string
     */
    public function getServerSoftware(): string
    {
        return $this[$this::SERVER_SOFTWARE];
    }

    /**
     * Returns HTTP accept header value
     *
     * @return string
     */
    public function getAccept(): string
    {
        return $this[$this::ACCEPT] ?? '';
    }

    /**
     * Returns HTTP accept language header value.
     *
     * @return string
     */
    public function getAcceptLanguage(): string
    {
        return $this[$this::ACCEPT_LANGUAGE] ?? '';
    }

    /**
     * Returns HTTP accept charset header value
     *
     * @return string
     */
    public function getAcceptCharset(): string
    {
        return $this[$this::ACCEPT_CHARSET] ?? '';
    }

    /**
     * Returns HTTP accept encoding header value
     *
     * @return string
     */
    public function getAcceptEncoding(): string
    {
        return $this[$this::ACCEPT_ENCODING] ?? '';
    }

    /**
     * Returns HTTP request user agent.
     *
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this[$this::USER_AGENT] ?? '';
    }

    /**
     * Returns HTTP referer header value
     *
     * @return string
     */
    public function getReferer(): string
    {
        return $this[$this::REFERER] ?? '';
    }

    /**
     * Returns HTTP remote IP address.
     *
     * @return string
     */
    public function getRemoteIP(): string
    {
        return $this[$this::REMOTE_IP] ?? '';
    }

    /**
     * Returns HTTP remote port.
     *
     * @return string
     */
    public function getRemotePort(): string
    {
        return $this[$this::REMOTE_PORT] ?? '';
    }

    /**
     * Returns true when request was made by Ajax.
     *
     * @return bool
     */
    public function isAjax(): bool
    {
        return $this[$this::REQUESTED_WITH] === $this::REQUESTED_WITH_AJAX;
    }
}
