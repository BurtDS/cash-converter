<?php

namespace Burtds\CashConverter;

use Burtds\CashConverter\Exceptions\CurrencyNotFound;

class Rate
{
    public function __construct(public array $values, protected string $baseCurrency)
    {

    }

    public function forCurrency(string $currency): float
    {
        return $this->values['conversion_rates'][$currency];
    }

    public function all(): array
    {
        return $this->values['conversion_rates'];
    }
}
