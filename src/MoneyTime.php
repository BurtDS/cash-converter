<?php

namespace Burtds\CashConverter;

use Exception;
use Burtds\CashConverter\Api;
use Burtds\CashConverter\Validator;
use Illuminate\Support\Facades\Http;

class MoneyTime
{
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
        $this->checkCurrency($fromCurrency);
        $this->checkCurrency($toCurrency);

        // Perform call
        $api = new Api();
        $rates = $api->grabRates($fromCurrency);
        $rate = $rates['conversion_rates'][$toCurrency];

        // Return the resulted rate
        return $rate;
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
        $this->checkCurrency($fromCurrency);

        // Perform call
        $api = new Api();

        //TODO check for invalid key error
        $rates = $api->grabRates($fromCurrency);
ray($rates);
        // Return the resulted rates
        return $rates['conversion_rates'];
    }

    /**
     * Checking weither a currency excists.
     *
     * @param  string  $currency
     *
     * @throws Exception
     */
    private function checkCurrency($currency)
    {
        $validator = new Validator();
        if (! $validator->isExistingCurrency($currency)) {
            throw new Exception('Given currency "'.$currency.'" is not supported.');
        }
    }

}
