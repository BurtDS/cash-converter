<?php

namespace Burtds\CashConverter\Exceptions;

use Exception;

class CurrencyNotSupported extends Exception
{
    public static function make(string $currency)
    {
        return new static("Given currency `{$currency}` is not supported");
    }
}
