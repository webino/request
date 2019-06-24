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
 * Trait RequestContextTrait
 * @package request
 */
trait RequestContextTrait
{
    /**
     * @var array
     */
    private $params;

    /**
     * @return array
     */
    abstract protected function createParams(): array;

    /**
     * @return array
     */
    protected function getParams(): array
    {
        $this->params or $this->params = $this->createParams();
        return $this->params;
    }

    /**
     * @param array $params
     */
    protected function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists((string) $offset, $this->getParams());
    }

    /**
     * @param string $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->getParams()[(string) $offset] : null;
    }

    /**
     * @param string $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        // read-only
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        // read-only
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array) $this->getParams();
    }
}
