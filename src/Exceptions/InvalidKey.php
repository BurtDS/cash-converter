<?php

namespace Burtds\CashConverter\Exceptions;

use Exception;

class InvalidKey extends Exception
{
    public static function make()
    {
        return new static('The used API key seems to be invalid');
    }
}
