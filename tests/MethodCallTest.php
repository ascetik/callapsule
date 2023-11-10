<?php

namespace Ascetik\Callapsule\Tests;

use Ascetik\Callapsule\Exceptions\MethodNotImplementedException;
use Ascetik\Callapsule\Tests\Mocks\Foo;
use Ascetik\Callapsule\Tests\Mocks\Greeter;
use Ascetik\Callapsule\Values\MethodCall;
use PHPUnit\Framework\TestCase;

class MethodCallTest extends TestCase
{
    private MethodCall $wrapper;

    protected function setUp(): void
    {
        $this->wrapper = MethodCall::build(new Greeter(), 'greet');
    }
    public function testShouldBeAbleToRunItsMethod()
    {
        $this->assertSame('hello John', $this->wrapper->apply(['John']));
    }

    public function testShouldBeAbleToReturnClosureBack()
    {
        $action = $this->wrapper->action();
        $this->assertInstanceOf(Greeter::class, $action[0]);
        $this->assertSame(
            'hello John',
            call_user_func($action,'John')
        );
    }

    public function testShouldThrowAnExceptionIfMethodIsNotImplemented()
    {
        $this->expectException(MethodNotImplementedException::class);
        MethodCall::build(new Foo, 'bar');
    }

}
