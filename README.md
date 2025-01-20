# Lambda Labs Cloud API Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/d4ver/lambdalabs-php.svg?style=flat-square)](https://packagist.org/packages/d4ver/lambdalabs-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/d4ver/lambdalabs-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/d4ver/lambdalabs-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/d4ver/lambdalabs-php.svg?style=flat-square)](https://packagist.org/packages/d4ver/lambdalabs-php)

This package provides a simple PHP client for the [Lambda Labs Cloud API](https://lambdalabs.com/cloud).

## Installation

You can install the package via composer:

```bash
composer require d4ver/lambdalabs-php
```

## Usage

```php
$client = new D4veR\LambdaLabs\LambdaLabs('YOUR_API_KEY');
$ids = $client->launch();

echo $client->info($ids[0]);
echo $client->running();

$client->terminate($ids);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Dave](https://github.com/d4ve-r)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
