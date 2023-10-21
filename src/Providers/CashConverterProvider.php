<?php

namespace Burtds\CashConverter\Providers;

use Illuminate\Support\ServiceProvider;

class CashConverterProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/cash-converter.php' =>  config_path('cash-converter.php'),
        ]);

    }
}
