# collabubble
A way to encapsulate a callable

## Purpose

This package is made to encapsulate a *callable* of any type, providing the ability to handle them the same way.
I needed this kind of package for routing or a service manager, any task to defer, to encapsulate callables correctly...

## Release notes

> v0.1.1

- **CallableType** abstract class available.
- 3 Exceptions availalbe, extending a **CallableTypeException** abstract class that is an **InvalidArgumentException** himself.
- 4 **CallableType** implementations for functions, methods, static methods and invokable instances.
- **CallWrapper** Factory available

## Usage

Use the **CallWrapper** factory static methods to build a CallableType :

```php
class Foo
{
    public function bar(){}
    public function __invoke(){}
    public static function biz(){}
}

// To wrap a Closure
$closureWrapper = CallWrapper::wrap(fn(string $name) => 'hello ' . $name);
// or
$closureWrapper = CallWrapper::wrapClosure(fn(string $name) => 'hello ' . $name);

// to wrap an instance and a method to call
$methodWrapper = CallWrapper::wrap([new Foo(), 'bar']);
// or
$methodWrapper = CallWrapper::wrapMethod(new Foo(), 'bar');

// to wrap a static method
$staticWrapper = CallWrapper::wrap([Foo::class, 'biz']);
// or
$staticWrapper = CallWrapper::wrapStatic(Foo::class, 'biz');

// To wrap an invokable class
$invokable = CallWrapper::wrap(new Foo());
// or
$invokable = CallWrapper::wrapInvokable(new Foo());

```

The use of this factory is the best choice to build and use a **CallableType**.
Some checks make direct instanciation unavailable due to private constructors.

A **CallableType** is able to run the callable it holds. For external needs, it is able to give its callable back as is :

```php

$callable = $closureWrapper->callable();
echo call_user_func($callable,' John'); // prints "hello John"

// or use it directly
echo $closureWrapper->apply(['name' => 'John']); // same result

```

## CallableType methods

- **CallableType**::apply(*?iterable*): *mixed* : execute callable and return the result
- **CallableType**::callable(): *callable*      : return wrapped callable

## Implementations

I could enumerate 4 use cases for a callable wrap :
- a Closure
- a class method, with an instance and the method to run
- a static class method, with a class-string instead of an instance
- an instance with __invoke magic method

If you can find more, feel free to use **CallableType** abstraction.

### ClosureCall

Holds a Closure.
Direct instanciation (public constructor)

No Errors/Exceptions thrown

### InvokableCall

Holds an *invokable* instance.
Static factory method for checks.

Throws an **UninvokableClassException** if the given instance does not implement *__invoke()* method.

### MethodCall

Holds an instance and a method.
Static factory method for checks.

Throws a **MethodNotImplementedException** if given method is not implemented.

### StaticCall

Holds a class name and a method name.
Static factory for checks.

Throws a **ClassNotFoundException** if given class does not exist.
Throws a **MethodNotImplementedException** if given method is not implemented.



