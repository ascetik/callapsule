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

use Ascetik\Callapsule\Types\CallableType;
use Closure;
use ReflectionFunction;

/**
 * Encapsulate a Closure
 *
 * @version 1.0.0
 */
class ClosureCall extends CallableType
{
    public function __construct(private readonly Closure $function)
    {
    }

    public function action(): callable
    {
        return $this->getCallable();
    }

    public function getCallable(): Closure
    {
        return $this->function;
    }

    public function getReflection(): ReflectionFunction
    {
        return new ReflectionFunction($this->function);
    }
}
