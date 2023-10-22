<?php

namespace Burtds\CashConverter;

use Burtds\CashConverter\Facades\CashConverter;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CashConverterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('cash-converter')
            ->hasConfigFile();
    }

    public function packageBooted()
    {
        $this->app->bind(ExchangeRateApi::class, function () {
            $apiKey = config('cash-converter.exchange_rate_api_key');

            return new ExchangeRateApi($apiKey);
        });
        $this->app->bind(Validator::class, function () {

            return new Validator();
        });

        $this->app->bind(CashConverter::class, function () {
            $api = app(ExchangeRateApi::class);
            $validator = app(Validator::class);

            return new MoneyTime($api, $validator);
        });
    }
}
