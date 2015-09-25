# Changelog

All Notable changes to `studiobonito/silverstripe-spamprotection-honeypot` will be documented in this file

## [Unreleased]
### Added
- Included changelog.
- Included `.gitattributes` file.
- Included `php` version `>=5.3.0` as a dependency.
- Included `scrutinizer/ocular` version `~1.1` as a development dependency.
- Updated license.
- Update Scrutinizer configuration.
- Update Travis configuration (include PHP 5.6, 7 and HHVM).
- Update PHPUnit configuration.
- Include contributing guide.
- Update readme.
- Included test case for failed validation.

### Fixed
- Removed `composer.lock` file.
- Updated `.gitignore` file.
- Updated `composer.json` file.
- Improved PSR-1 and PSR-2 conformance.
- Included safe mocking of translation function.
- Corrected `getValidator()` to return `MockInterface`.

## [1.0.1] - 2014-09-09
### Added
- Included `silverstripe/spamprotection` version `~1.2.0` as a dependency.

### Changed
- Excluded methods from code coverage calculations.

[Unreleased]: https://github.com/studiobonito/silverstripe-spamprotection-honeypot/compare/1.0.1...HEAD
[1.0.1]: https://github.com/studiobonito/silverstripe-spamprotection-honeypot/compare/1.0.0...1.0.1