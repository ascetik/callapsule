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

/**
 * Encapsulate an instance and the method to call
 *
 * @version 1.0.0
 */
class MethodCall extends CallableType
{
    public function __construct(
        private readonly object $subject,
        private readonly string $method
    ) {
    }


    public function action(): array
    {
        return [$this->subject, $this->method];
    }
}
