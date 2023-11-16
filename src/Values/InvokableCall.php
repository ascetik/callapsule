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

use Ascetik\Callapsule\Exceptions\UninvokableClassException;
use Ascetik\Callapsule\Types\CallableType;
use ReflectionFunctionAbstract;
use ReflectionMethod;

/**
 * Encapsulate an instance implementing
 * __invoke() magic method
 *
 * @version 1.0.0
 */
class InvokableCall extends CallableType
{
    private function __construct(private object $invokable)
    {
    }

    public function action(): callable
    {
        return $this->getCallable();
    }

    public function getCallable(): object
    {
        return $this->invokable;
    }

    public function getReflection(): ReflectionMethod
    {
        return new ReflectionMethod($this->invokable,'__invoke');
    }

    /**
     * @throws UninvokableClassException if instance is not invokable
     */
    public static function build(object $instance)
    {
        if (method_exists($instance, '__invoke')) {
            return new self($instance);
        }
        throw new UninvokableClassException();
    }
}
