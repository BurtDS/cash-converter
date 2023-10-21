<?php

test('example', function () {
    expect(true)->toBeTrue();
});



use Burtds\CashConverter\MoneyTime;

it('can grab a an array of all conversion rates based on a given currency', function () {
    $moneyTime = new MoneyTime();
    $rates = $moneyTime->getRates('EUR');
    expect($rates)->toBeArray();
});

it('can grab a single conversion rate based on a given currency', function () {
    $moneyTime = new MoneyTime();
    $rate = $moneyTime->getRate('EUR', 'USD');
    expect($rate)->toBeFloat();
});

it('can convert money from one currency to another', function () {
    $moneyTime = new MoneyTime();
    $amount = $moneyTime->convert('EUR', 'USD', 100);
    expect($amount)->toBeFloat();
});

it('can\'t convert an inexisting currecy', function () {
    $moneyTime = new MoneyTime();
    $rate = $moneyTime->getRates('XYZ');
})->throws(Exception::class);

it('can\'t convert an inexisting currecy to a known one', function () {
    $moneyTime = new MoneyTime();
    $rate = $moneyTime->getRate('XYZ', 'USD');
})->throws(Exception::class);

it('can\'t convert an known currnecy to an unknown one', function () {
    $moneyTime = new MoneyTime();
    $rate = $moneyTime->getRate('USD', 'XYZ');
})->throws(Exception::class);
