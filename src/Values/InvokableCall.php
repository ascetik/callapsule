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

use Ascetik\Callabubble\Exceptions\UninvokableClassException;
use Ascetik\Callabubble\Types\CallableType;

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
        return $this->getInvokable();
    }

    public function getInvokable(): object
    {
        return $this->invokable;
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
