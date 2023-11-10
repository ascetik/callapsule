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

namespace Ascetik\Callapsule\Exceptions;

use Ascetik\Callapsule\Types\CallableTypeException;

class ClassNotFoundException extends CallableTypeException
{
    public function __construct(string $className)
    {
        $this->message = 'Class "' . $className . '" not found';
    }
}
