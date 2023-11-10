<?php

declare(strict_types=1);

namespace Ascetik\Callapsule\Tests;

use Ascetik\Callapsule\Values\ClosureCall;
use PHPUnit\Framework\TestCase;

class ClosureCallTest extends TestCase
{
    private ClosureCall $wrapper;

    protected function setUp(): void
    {
        $this->wrapper = new ClosureCall(fn (string $name) => 'hello ' . $name);
    }
    public function testShouldBeAbleToRunItsClosure()
    {
        $this->assertSame('hello John', $this->wrapper->apply(['John']));
    }

    public function testShouldBeAbleToReturnClosureBack()
    {
        $this->assertSame(
            'hello John',
            call_user_func($this->wrapper->action(), 'John')
        );
    }
}
