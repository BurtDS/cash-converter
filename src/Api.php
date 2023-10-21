<?php

namespace Burtds\CashConverter;

use Illuminate\Support\Facades\Http;

class Api
{
    private const BASE_URL = "https://v6.exchangerate-api.com/v6/";

    /**
     * Concatinating the url, based on the base URL of the servce.
     * Returning a json object of the response.
     *
     * @param  string  $base
     *
     * @return json
     */
    public static function grabRates($base)
    {
        $url = self::BASE_URL."/".config('cash-converter.api_key');

        $response = Http::get($url."/latest/".$base);

        return $response->json();
    }
}
