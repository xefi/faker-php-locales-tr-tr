# Faker PHP — tr_TR locale

Turkish (`tr_TR`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-tr-tr
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('tr_TR');
```

Generators without a `tr_TR` variant fall back to the default locale.

## What's included

- Names: `name()`, `firstName()`, `lastName()`, `title()`.
- Personal identifier: `tcKimlikNo()` (T.C. Kimlik No, 11 digits, two check digits).
- Company identifier: `vkn()` (Vergi Kimlik Numarası, 10 digits with check digit).
- Addresses: `province()` (81 iller), `provinceCode()` (plate code 01–81), `city()`, 5-digit `postcode()` starting with the plate code, `streetName()`, `streetAddress()` and `fullAddress()`.
- Phone numbers with the `0` trunk prefix or the `+90` indicator.
- `iban()`: `TR` IBAN with a valid checksum.
- Colours and text in Turkish; `words()` follows the Turkish dotted / dotless i lowercase rules.

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerTrTrServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
