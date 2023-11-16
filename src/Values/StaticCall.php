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

use Ascetik\Callapsule\Exceptions\ClassNotFoundException;
use Ascetik\Callapsule\Exceptions\MethodNotImplementedException;
use Ascetik\Callapsule\Types\CallableType;
use Ascetik\Callapsule\Values\Methods\StaticMethod;
use InvalidArgumentException;
use ReflectionMethod;

/**
 * Encapsulate a class name and a static method to call
 *
 * @version 1.0.0
 */
class StaticCall extends CallableType
{
    private function __construct(private string $subject, private string $method)
    {
    }

    public function action(): callable
    {
        return $this->getCallable()->get();
    }

    public function getCallable(): StaticMethod
    {
        return new StaticMethod($this->subject, $this->method);
    }

    public function getReflection(): ReflectionMethod
    {
        return new ReflectionMethod($this->subject, $this->method);
    }

    /**
     * @throws InvalidArgumentException if class does not exist
     * @throws InvalidArgumentException if method is not implemented
     */
    public static function build(string $className, string $method): self
    {
        if (!class_exists($className)) {
            throw new ClassNotFoundException($className);
        }
        if (!method_exists($className, $method)) {
            throw new MethodNotImplementedException($method);
        }

        return new self($className, $method);
    }
}
