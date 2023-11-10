<?php

namespace Ascetik\Callabubble\Exceptions;

class UninvokableClassException extends \InvalidArgumentException
{
    public function __construct()
    {
        $this->message = 'This instance is not invokable';
    }
}
