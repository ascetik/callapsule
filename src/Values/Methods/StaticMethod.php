<?php

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
