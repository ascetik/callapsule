<?php

/**
 * This is part of the ascetik/callabubble package
 *
 * @package    Callabubble
 * @category   Exception
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

declare(strict_types=1);

namespace Ascetik\Callabubble\Exceptions;

use Ascetik\Callabubble\Types\CallableTypeException;

class UninvokableClassException extends CallableTypeException
{
    public function __construct()
    {
        $this->message = 'This instance is not invokable';
    }
}
