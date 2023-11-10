<?php

namespace Ascetik\Callabubble\Values\Methods;

use Ascetik\Callabubble\Types\ClassMethod;

class InstanceMethod implements ClassMethod
{
    public function __construct(
        public readonly object $instance,
        public readonly string $method
    ) {
    }

    public function get(): array
    {
        return [$this->instance, $this->method];
    }
}
