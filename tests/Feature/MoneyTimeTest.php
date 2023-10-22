<?php

use Burtds\CashConverter\Facades\CashConverter;

it('can grab a an array of all conversion rates based on a given currency', function () {
    $rates = CashConverter::getRates('EUR');

    expect($rates)->toBeArray();
});

it('can grab a single conversion rate based on a given currency', function () {
    $rate = CashConverter::getRate('EUR', 'USD');

    expect($rate)->toBeFloat();
});

it('can convert money from one currency to another', function () {
    $amount = CashConverter::convert('EUR', 'USD', 100);

    expect($amount)->toBeFloat();
});

it('cannot convert an non-existing currency', function (array $arguments) {

    CashConverter::getRate(...$arguments);
})->with([
    [['invalid-currency', 'USD']],
    [['USD', 'invalid-currency']],
])->throws(Exception::class);
