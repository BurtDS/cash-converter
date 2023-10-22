<?php

namespace Burtds\CashConverter\Facades;

use Illuminate\Support\Facades\Facade;

class CashConverter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CashConverter::class;
    }
}