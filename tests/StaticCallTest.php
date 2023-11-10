<?php

namespace Ascetik\Callapsule\Tests;

use Ascetik\Callapsule\Exceptions\ClassNotFoundException;
use Ascetik\Callapsule\Exceptions\MethodNotImplementedException;
use Ascetik\Callapsule\Tests\Mocks\Foo;
use Ascetik\Callapsule\Tests\Mocks\Greeter;
use Ascetik\Callapsule\Values\StaticCall;
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

    public function testShouldThrowAnExceptionOnInvalidClassName()
    {
        $this->expectException(ClassNotFoundException::class);
        StaticCall::build('Bar','foo');
    }

    public function testShouldThrowAnExceptionOnUnavailableMethod()
    {
        $this->expectException(MethodNotImplementedException::class);
        StaticCall::build(Foo::class,'foo');
    }
   

}
