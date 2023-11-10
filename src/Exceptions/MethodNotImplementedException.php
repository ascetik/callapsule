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

class MethodNotImplementedException extends \InvalidArgumentException
{
    public function __construct(string $method)
    {
        $this->message = 'The method "' . $method . '" is not implemented';
    }
}
