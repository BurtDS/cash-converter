<?php

namespace Burtds\CashConverter\Exceptions;

use Exception;

class CurrencyNotFound extends Exception
{
    public static function make(string $currency)
    {
        return new static("Currency `{$currency}` not found");
    }
}