
[![Latest Version on Packagist](https://img.shields.io/packagist/v/burtds/cash-converter.svg?style=flat-square)](https://packagist.org/packages/burtds/cash-converter)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/burtds/cash-converter/run-tests-pest.yml?branch=main&label=Tests)](https://github.com/burtds/cash-converter/actions/workflows/run-tests-pest.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/burtds/cash-converter.svg?style=flat-square)](https://packagist.org/packages/burtds/cash-converter)

## About cash-converter

A small and simple package that takes away the pain of communicating with ExchangeRate-API directly to convert a certain amount of money between 2 currencies. 
You can also get the conversion rate or an array with all known conversion rates based on a certain currency.

## How to use cash-converter

### Installation

Install the package via composer:

```bash
composer require burtds/cash-converter
```

Afterwards, publish the service provider.

```bash
php artisan vendor:publish --provider="Burtds\CashConverter\CashConverterProvider"
```

### Usage

First of all add the API key of the ExchangeRate-API service to your `.env` file of your project.
If you don't have an ExchangeRate-API account yet, create one at [exchangerate-api.com](https://exchangerate-api.com).
Once you have an account you can copy your API key from the dashboard page and put it into your `.env` file.

```
EXCHANGE_RATE_API_KEY="YOUR-API-KEY"
```

To use it, import the Facade of this package at the top of your file.

```php
use Burtds\CashConverter\Facades\CashConverter;
```

Once that is done, you can use the conversion functions.

```php
CashConverter::getRates('EUR'); // returns an array of the currenct conversion rates based on the given currency, in this case Euro
CashConverter::getRate('EUR','USD'); // returns the current conversion rate for Euro to US Dollars
CashConverter::convert('EUR','USD', 25); // returns the converted vanlue in US Dollars for the given 25 Euro
```

### Test & Format

To execute the tests, run:

```bash
composer test
```

To format the code using pint, run:

```bash
composer format
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send me an email via [bert@bert.gent](mailto:bert@bert.gent). 
I'll get back to you as soon as possible.

## Credits

- [Bert De Swaef](https://github.com/burtds)
- [All Contributors](../../contributors)

And a huge thanks to [Freek Van der Herten](https://github.com/freekmurze) for the guidance.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
