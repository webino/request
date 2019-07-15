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
 * Class ConsoleRequest
 * @package request
 */
class ConsoleRequest extends AbstractRequest implements
    ConsoleRequestInterface,
    InstanceFactoryMethodInterface
{
    /**
     * @param CreateInstanceEventInterface $event
     * @return ConsoleRequest
     */
    public static function create(CreateInstanceEventInterface $event): ConsoleRequest
    {
        $params = $event->getParameters();
        return new static($params[0] ?? []);
    }

    /**
     * Returns request defaults
     *
     * @param array $overrides
     * @return array
     */
    public static function defaults(array $overrides = []): array
    {
        return $overrides + [
            ConsoleRequest::TIME => ConsoleRequest::TIME_DEFAULT,
            ConsoleRequest::SCRIPT_FILENAME => ConsoleRequest::SCRIPT_FILENAME_DEFAULT,
            ConsoleRequest::COMMAND => '',
        ];
    }

    /**
     * Returns console command.
     *
     * @return string
     */
    public function getCommand(): string
    {
        return $this[$this::COMMAND] ?? $this['argv'][1] ?? '';
    }
}
