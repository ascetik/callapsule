<?php

namespace Ascetik\Callabubble\Tests;

use Ascetik\Callabubble\Exceptions\UninvokableClassException;
use Ascetik\Callabubble\Tests\Mocks\Foo;
use Ascetik\Callabubble\Tests\Mocks\Greeter;
use Ascetik\Callabubble\Values\InvokableCall;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class InvokableCallTest extends TestCase
{
    private InvokableCall $wrapper;

    protected function setUp(): void
    {
        $this->wrapper = InvokableCall::build(new Greeter());
    }
    public function testShouldBeAbleToInvokeItsClass()
    {
        $this->assertSame('hi John', $this->wrapper->apply(['John']));
    }

    public function testShouldBeAbleToReturnInvokableBack()
    {
        $action = $this->wrapper->action();
        $this->assertInstanceOf(Greeter::class,$action);
        $this->assertSame(
            'hi John',
            call_user_func($action,'John')
        );
    }

    public function testShouldThrowAnExceptionOnUninvokableClass()
    {
        $this->expectException(UninvokableClassException::class);
        $this->expectExceptionMessage('This instance is not invokable');
        InvokableCall::build(new Foo);
    }
}
