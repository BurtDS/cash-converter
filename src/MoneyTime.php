<?php

namespace Burtds\CashConverter;

class MoneyTime
{
    public function __construct(protected ExchangeRateApi $api, protected Validator $validator)
    {

    }

    /**
     * Converting a given amount of "money", from one currency to another.
     *
     * @return float
     */
    public function convert(string $fromCurrency, string $toCurrency, float $amount)
    {
        // Take out the needed exchange rate
        $currentRate = $this->getRate($fromCurrency, $toCurrency);

        // Do some calculation
        $convertedValue = round($amount * $currentRate, 2);

        // Return the result
        return $convertedValue;
    }

    /**
     * Collecting the current exchange rate between 2 currencies.
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
     *
     * @return array
     */
    public function getRates(string $fromCurrency)
    {
        // Check validity of the currency
        $this->validator->isExistingCurrency($fromCurrency);

        // Perform call to remote service
        $rates = $this->api->rates($fromCurrency);

        // Return the resulted rates
        return $rates->all();
    }
}
