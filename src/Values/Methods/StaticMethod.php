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

namespace Ascetik\Callabubble\Values\Methods;

class StaticMethod
{
    public function __construct(
        public readonly string $className,
        public readonly string $method
    ) {
    }

    public function get(): array
    {
        return [$this->className, $this->method];
    }
}
