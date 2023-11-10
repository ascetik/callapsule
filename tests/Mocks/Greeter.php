<?php

namespace Ascetik\Callabubble\Tests\Mocks;

class Greeter
{
    public function __invoke(string $name)
    {
        return 'hi ' . $name;
    }
    
    public function greet(string $name)
    {
        return 'hello ' . $name;
    }

    public static function bye(string $name)
    {
        return 'bye ' . $name;
    }
}
