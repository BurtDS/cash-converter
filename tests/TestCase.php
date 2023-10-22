<?php

namespace Tests;

use Burtds\CashConverter\CashConverterServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            CashConverterServiceProvider::class,
        ];
    }
}
