<?php

/**
 * This is part of the ascetik/callabubble package
 *
 * @package    Callabubble
 * @category   Abstraction
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

declare(strict_types=1);

namespace Ascetik\Callapsule\Types;

use Closure;

/**
 * Describe the behavior of a
 * callable wrapper.
 *
 * A CallableType MUST be able to execute the callable it handles with optionnal parameters.
 * A CallableType MUST be able to return its callable as is (for dependency injection, for example)
 *
 * @abstract
 * @version 1.0.0
 */
abstract class CallableType
{
    public function apply(iterable $parameters = []): mixed
    {
        return call_user_func_array(
            $this->action(),
            iterator_to_array($parameters)
        );
    }

    abstract public function action(): callable;
    abstract public function getCallable(): object;

}
