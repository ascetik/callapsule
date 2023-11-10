<?php

namespace Ascetik\Callabubble\Tests;

use Ascetik\Callabubble\Factories\CallWrapper;
use Ascetik\Callabubble\Tests\Mocks\Greeter;
use Ascetik\Callabubble\Values\ClosureCall;
use Ascetik\Callabubble\Values\InvokableCall;
use Ascetik\Callabubble\Values\MethodCall;
use Ascetik\Callabubble\Values\StaticCall;
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
