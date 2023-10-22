<?php

namespace Burtds\CashConverter;

use Exception;
use Burtds\CashConverter\ExchangeRateApi;
use Burtds\CashConverter\Validator;
use Illuminate\Support\Facades\Http;

class MoneyTime
{
    public function __construct(protected ExchangeRateApi $api, protected Validator $validator)
    {

    }

    /**
     * Converting a given amount of "money", from one currency to another.
     *
     * @param  string  $fromCurrency
     * @param  string  $toCurrency
     * @param  string  $amount
     *
     * @return float
     */
    public function convert(string $fromCurrency, string $toCurrency, float $amount)
    {
        // Take out the needed exchange rate
        $currentRate = $this->getRate($fromCurrency, $toCurrency);

        // Do some calculation
        $convertedValue = round($amount*$currentRate,2);

        // Return the result
        return $convertedValue;
    }

    /**
     * Collecting the current exchange rate between 2 currencies.
     *
     * @param  string  $fromCurrency
     * @param  string  $toCurrency
     *
     * @return float
     */
    public function getRate(string $fromCurrency, string $toCurrency)
    {
        // Because the api restricts this feature to a paid tier
        // We're simulating this by using the getRates endpoint an grabbing the needed target currency.

        // Check validity of the currencies
        $this->validator->isExistingCurrency($fromCurrency);
        $this->validator->isExistingCurrency($toCurrency);

        $rates = $this->api->rates($fromCurrency);

        return $rates->forCurrency($toCurrency);
    }

    /**
     * Collecting all exchange rates based on a given currency.
     *
     * @param  string  $fromCurrency
     *
     * @return array
     */
    public function getRates(string $fromCurrency)
    {
        // Check validity of the currency
        $this->validator->isExistingCurrency($fromCurrency);

        //TODO check for invalid key error
        $rates = $this->api->rates($fromCurrency);

        // Return the resulted rates
        return $rates->all();
    }

}
