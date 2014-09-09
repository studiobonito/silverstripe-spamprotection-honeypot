# SpamProtection Honeypot Module

[![Build Status](https://travis-ci.org/studiobonito/silverstripe-spamprotection-honeypot.svg?branch=master)](https://travis-ci.org/studiobonito/silverstripe-spamprotection-honeypot)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/studiobonito/silverstripe-spamprotection-honeypot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/studiobonito/silverstripe-spamprotection-honeypot/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/studiobonito/silverstripe-spamprotection-honeypot/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/studiobonito/silverstripe-spamprotection-honeypot/?branch=master)

## Overview

Provide Honeypot spam protection for SilverStripe CMS.
Create a form field hidden from users that invalidates submission if it contains any data.
Also invalidate submissions that respond to quickly.

## Requirements

- SilverStripe 3.1 or newer.
- SilverStripe [SpamProtection](https://github.com/silverstripe/silverstripe-framework) 1.2 or newer.

## Installation Instructions

### Composer

Run the following to add this module as a requirement and install it via composer.

```bash
$ composer require studiobonito/silverstripe-spamprotection-honeypot
```

### Manual

Copy the 'honeypot' folder to the root of your SilverStripe installation.

## Contributing

### Unit Testing

```bash
$ composer install --prefer-dist --dev
$ phpunit
```

## License

All work copyright [Studio Bonito Ltd.](http://www.studiobonito.co.uk/) under BSD-2-Clause license.