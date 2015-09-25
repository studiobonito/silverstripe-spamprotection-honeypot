# SpamProtection Honeypot Module

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Overview

Provide Honeypot spam protection for SilverStripe CMS.
Create a form field hidden from users that invalidates submission if it contains any data.
Also invalidate submissions that respond to quickly.

## Requirements

- SilverStripe 3.1 or newer.
- SilverStripe [SpamProtection](https://github.com/silverstripe/silverstripe-spamprotection) 1.2 or newer.

## Install

### Via Composer

Run the following to add this module as a requirement and install it via composer.

``` bash
$ composer require studiobonito/silverstripe-spamprotection-honeypot
```

### Manually

Copy the 'silverstripe-spamprotection-honeypot' folder to the root of your SilverStripe installation.

## Testing

```bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email support@studiobonito.co.uk instead of using the issue tracker.

## Credits

- [Tom Densham][link-author]
- [All Contributors][link-contributors]

## License

The BSD-2-Clause License. Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/github/release/studiobonito/silverstripe-spamprotection-honeypot.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/studiobonito/silverstripe-spamprotection-honeypot/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/studiobonito/silverstripe-spamprotection-honeypot.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/studiobonito/silverstripe-spamprotection-honeypot.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/studiobonito/silverstripe-spamprotection-honeypot.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/studiobonito/silverstripe-spamprotection-honeypot
[link-travis]: https://travis-ci.org/studiobonito/silverstripe-spamprotection-honeypot
[link-scrutinizer]: https://scrutinizer-ci.com/g/studiobonito/silverstripe-spamprotection-honeypot/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/studiobonito/silverstripe-spamprotection-honeypot
[link-downloads]: https://packagist.org/packages/studiobonito/silverstripe-spamprotection-honeypot
[link-author]: https://github.com/nedmas
[link-contributors]: ../../contributors