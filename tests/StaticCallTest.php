<?php

namespace Ascetik\Callabubble\Tests;

use Ascetik\Callabubble\Tests\Mocks\Greeter;
use Ascetik\Callabubble\Values\StaticCall;
use PHPUnit\Framework\TestCase;

class StaticCallTest extends TestCase
{
    private StaticCall $wrapper;

    protected function setUp(): void
    {
        $this->wrapper = StaticCall::build(Greeter::class, 'bye');
    }
    public function testShouldBeAbleToRunItsMethod()
    {
        $this->assertSame('bye John', $this->wrapper->apply(['John']));
    }

    public function testShouldBeAbleToReturnStaticMethodBack()
    {
        $action = $this->wrapper->action();
        $expectedAction = [Greeter::class, 'bye'];
        $this->assertSame($expectedAction, $action);
        $this->assertSame(
            'bye John',
            call_user_func($action,'John')
        );
    }

}
