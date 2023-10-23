<?php

namespace Burtds\CashConverter\Exceptions;

use Exception;

class InactiveAccount extends Exception
{
    public static function make()
    {
        return new static('The account linked to the API Key seems to be inactive');
    }
}
