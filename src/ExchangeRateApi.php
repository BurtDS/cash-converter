<?php

namespace Burtds\CashConverter;

use Illuminate\Support\Facades\Http;

class ExchangeRateApi
{
    public function __construct(protected string $apiKey)
    {
    }

    public function rates(string $currency): Rate
    {
        $url = "https://v6.exchangerate-api.com/v6/{$this->apiKey}/latest/{$currency}";

        $response = Http::get($url);

        $rawExchangeRates = $response->json();

        if ($rawExchangeRates['result'] !== 'success') {
            throw match ($rawExchangeRates['error-type']) {
                'invalid-key' => InvalidKey::make(),
                'inactive-account' => InactiveAccount::make(),
                'quota-reached' => QuotaReached::make(),
            };
        }

        return new Rate($rawExchangeRates, $currency);
    }
}
