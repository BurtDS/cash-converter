<?php

namespace Burtds\CashConverter;

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
}
