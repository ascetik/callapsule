<?php

/**
 * This is part of the ascetik/callabubble package
 *
 * @package    Callabubble
 * @category   Interface
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

declare(strict_types=1);

namespace Ascetik\Callabubble\Types;

/**
 * Describe the behavior of a
 * callable wrapper.
 *
 * A CallableType MUST be able to execute the callable it handles with optionnal parameters.
 * A CallableType MUST be able to return its callable as is (for dependency injection, for example)
 *
 * @version 1.0.0
 */
interface CallableType
{
    public function apply(iterable $parameters = []): mixed;
    public function action(): callable;
}
