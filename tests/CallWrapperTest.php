<?php

namespace Ascetik\Callapsule\Tests;

use Ascetik\Callapsule\Factories\CallWrapper;
use Ascetik\Callapsule\Tests\Mocks\Greeter;
use Ascetik\Callapsule\Values\ClosureCall;
use Ascetik\Callapsule\Values\InvokableCall;
use Ascetik\Callapsule\Values\MethodCall;
use Ascetik\Callapsule\Values\StaticCall;
use PHPUnit\Framework\TestCase;

class CallWrapperTest extends TestCase
{

    public function testShouldReturnAClosureCall()
    {
        $this->assertInstanceOf(
            ClosureCall::class,
            CallWrapper::wrap(fn () => 'hello'));
    }

    public function testShouldReturnAMethodCall()
    {
        $this->assertInstanceOf(MethodCall::class, CallWrapper::wrap([new Greeter(), 'greet']));
    }

    public function testShouldReturnAStaticCall()
    {
        $this->assertInstanceOf(StaticCall::class, CallWrapper::wrap([Greeter::class, 'bye']));
    }

    public function testShouldReturnAnInvokableCall()
    {
        $this->assertInstanceOf(InvokableCall::class, CallWrapper::wrap(new Greeter()));
    }
}
