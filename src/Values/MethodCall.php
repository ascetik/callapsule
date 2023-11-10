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

namespace Ascetik\Callapsule\Values;

use Ascetik\Callapsule\Exceptions\MethodNotImplementedException;
use Ascetik\Callapsule\Types\CallableType;
use Ascetik\Callapsule\Types\ClassMethod;
use Ascetik\Callapsule\Values\Methods\InstanceMethod;

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

    public function action(): callable
    {
        return $this->getCallable()->get();
    }

    public function getCallable(): ClassMethod
    {
        return new InstanceMethod($this->subject, $this->method);
    }

    /**
     * @throws MethodNotImplementedException if method is not implemented
     */
    public static function build(object $instance, string $method): self
    {
        if (method_exists($instance, $method)) {
            return new self($instance, $method);
        }
        throw new MethodNotImplementedException($method);
    }
}
