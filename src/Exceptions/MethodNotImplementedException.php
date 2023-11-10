<?php

namespace Ascetik\Callabubble\Exceptions;

class MethodNotImplementedException extends \InvalidArgumentException
{
    public function __construct(string $method)
    {
        $this->message = 'The method "' . $method . '" is not implemented';
    }
}
