## About cash-converter

A small & simple package, but takes away the pain of communicating with an API directly to convert an certain amount of cash between 2 currencies. 
You can also get the conversion rate or an array with all known conversion rates based on a certain currency.

## How to use cash-converter

### Installation

You can install the package via composer: (this package still needs to be added to Packagist for this to work.)
```bash
composer require burtds/cash-converter
```
Afterwords, we'll need to publish the service provider.
```bash
php artisan vendor:publish --provider="Burtds\CashConverter\Providers\CashConverterProvider"
```

### Usage

First of all import the mail class of this package on top of your file.
```php
use Burtds\CashConverter\MoneyTime;
```
Once that is done, you'll be able to use the conversion functions.
```php
$moneyTime = new MoneyTime();
$moneyTime->getRates('EUR'); // returns an array of the currenct converison rates based on the given currency, in this case Euro's
$moneyTime->getRate('EUR', 'USD'); // returns the currenct conversion rate for Euro to US Dollars
$moneyTime->convert('EUR', 'USD', 25); // returns the converted vanlue in US Dollars for the given 25 Euros
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send me an e-mail via [bert@bert.gent](mailto:bert@bert.gent). I'll get back at you as soon as possible.

## Credits

- [Bert De Swaef](https://github.com/burtds)
- [All Contributors](../../contributors)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
