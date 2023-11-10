<?php

namespace Ascetik\Callabubble\Factories;

use Ascetik\Callabubble\Types\CallableType;
use Ascetik\Callabubble\Values\ClosureCall;
use Ascetik\Callabubble\Values\InvokableCall;
use Ascetik\Callabubble\Values\MethodCall;
use Ascetik\Callabubble\Values\StaticCall;
use Closure;
use InvalidArgumentException;
use OutOfRangeException;

class CallWrapper
{
    public static function wrap(callable $call): CallableType
    {
        if ($call instanceof Closure) {
            return self::wrapClosure($call);
        }
        if (is_array($call)) {
            return self::inferWrapper($call);
        }
        if (is_object($call)) {
            return self::wrapInvokable($call);
        }

        throw new InvalidArgumentException('No matching use case for call entry');
    }

    public static function wrapClosure(Closure $function): ClosureCall
    {
        return new ClosureCall($function);
    }

    public static function wrapMethod(object $instance, string $method): MethodCall
    {
        return MethodCall::build($instance, $method);
    }

    public static function wrapStatic(string $className, string $method): StaticCall
    {
        return StaticCall::build($className, $method);
    }

    public static function wrapInvokable(object $invokable): InvokableCall
    {
        return InvokableCall::build($invokable);
    }

    private static function inferWrapper(array $call)
    {
        if (count($call) != 2) {
            throw new OutOfRangeException('Class/method parameters count does not match');
        }
        return is_string($call[0])
            ? self::wrapStatic(...$call)
            : self::wrapMethod(...$call);
    }
}
