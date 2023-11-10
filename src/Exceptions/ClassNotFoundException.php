<?php

namespace Ascetik\Callabubble\Exceptions;

class ClassNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $className)
    {
        $this->message = 'Class "' . $className . '" not found';
    }
}
