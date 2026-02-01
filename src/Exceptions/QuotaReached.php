<?php

namespace Burtds\CashConverter\Exceptions;

use Exception;

class QuotaReached extends Exception
{
    public static function make()
    {
        return new static('The Quota for the used API Key has been reached');
    }
}
