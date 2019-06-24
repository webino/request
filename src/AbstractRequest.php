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
 * Class AbstractRequest
 * @package request
 */
abstract class AbstractRequest implements RequestInterface
{
    use RequestContextTrait;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $params and $this->params = $params;
    }

    /**
     * Returns request defaults
     *
     * @param array $overrides
     * @return array
     */
    abstract public static function defaults(array $overrides): array;

    /**
     * @return array
     */
    protected function createParams(): array
    {
        return $_SERVER;
    }

    /**
     * Returns HTTP request time
     *
     * @return float
     */
    public function getRequestTime(): float
    {
        return $this[$this::TIME] ?? 0.0;
    }

    /**
     * Returns executed script filename.
     *
     * @return string
     */
    public function getScriptFileName(): string
    {
        return $this[$this::SCRIPT_FILENAME] ?? '';
    }

    /**
     * @return iterable
     */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->getParams());
    }
}
