<?php

/**
 * This is part of the ascetik/callabubble package
 *
 * @package    Callabubble
 * @category   Value Object
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

declare(strict_types=1);

namespace Ascetik\Callabubble\Values;

use Ascetik\Callabubble\Types\CallableType;
use InvalidArgumentException;

/**
 * Encapsulate an instance and the method to call
 *
 * @version 1.0.0
 */
class MethodCall extends CallableType
{
    private function __construct(
        private readonly object $subject,
        private readonly string $method
    ) {
    }


    public function action(): array
    {
        return [$this->subject, $this->method];
    }

    /**
     * @throws InvalidArgumentException if method is not implemented
     */
    public static function build(object $instance, string $method): self
    {
        if (method_exists($instance, $method)) {
            return new self($instance, $method);
        }

        throw new InvalidArgumentException('The method "' . $method . '" is not implemented');
    }
}
