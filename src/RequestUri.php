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
 * Class RequestUri
 * @package request
 */
class RequestUri implements RequestUriInterface
{
    /**
     * HTTP request URI
     *
     * @var string
     */
    private $uri;

    /**
     * @var HttpRequestInterface
     */
    private $request;

    /**
     * @param CreateInstanceEventInterface $event
     * @return RequestUri
     */
    public static function create(CreateInstanceEventInterface $event): RequestUri
    {
        $params = $event->getParameters();
        return new static(...$params);
    }

    /**
     * @param HttpRequestInterface $request
     */
    public function __construct(HttpRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $this->uri or $this->uri = $this->createUri();
        return $this->uri;
    }

    /**
     * @return string
     */
    protected function createUri(): string
    {
        $request = $this->request;

        // IIS7 with URL Rewrite: make sure we get the unencoded url
        // (double slash problem).
        $iisUrlRewritten = $request['IIS_WasUrlRewritten'] ?? '';
        $unencodedUrl = (string) $request['UNENCODED_URL'] ?? '';

        if ('1' == $iisUrlRewritten && '' !== $unencodedUrl) {
            return $unencodedUrl;
        }

        $requestUri = $request['REQUEST_URI'] ?? '';

        // HTTP proxy requests setup request URI with scheme and host [and port]
        // + the URL path, only use URL path.
        if ($requestUri) {
            $uri = preg_replace('#^[^/:]+://[^/]+#', '', $requestUri);
            return is_string($uri) ? $uri : '';
        }

        // IIS 5.0, PHP as CGI.
        $origPathInfo = (string) $request['ORIG_PATH_INFO'] ?? '';
        if ($origPathInfo) {
            $queryString = $request[$request::QUERY_STRING] ?? '';
            $queryString or $origPathInfo .= '?' . $queryString;
            return $origPathInfo;
        }

        // last resort
        return '/';
    }
}
