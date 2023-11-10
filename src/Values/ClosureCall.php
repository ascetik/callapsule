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
use Closure;

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
        return $this->getClosure();
    }

    public function getClosure(): Closure
    {
        return $this->function;
    }
}
