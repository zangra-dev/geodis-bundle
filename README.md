# Geodis Bundle

[![Latest Stable Version](https://img.shields.io/packagist/v/zangra/geodis-bundle.svg?label=stable)](https://packagist.org/packages/zangra/geodis-bundle)
[![Build Status](https://scrutinizer-ci.com/g/zangra-dev/geodis-bundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/zangra-dev/geodis-bundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zangra-dev/geodis-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zangra-dev/geodis-bundle/?branch=master)
[![PHP Version Require](http://poser.pugx.org/zangra/geodis-bundle/require/php)](https://packagist.org/packages/zangra/geodis-bundle)
[![License](http://poser.pugx.org/zangra/geodis-bundle/license)](https://packagist.org/packages/zangra/geodis-bundle)

---

## About

**GeodisBundle** is a Symfony bundle for generating and managing Geodis shipping labels.  
It provides a simple and efficient integration of the Geodis API into Symfony projects.

---

### What's new in 3.0

- ✅ Full compatibility with modern Symfony versions
- ✅ Improved service configuration with `autowire` & `autoconfigure` support
- ✅ Cleaner error handling with a new `ExceptionListener`
- ✅ Lazy-loading for the `GeodisJsonApi` service
- ✅ Refactored code for better maintainability

---

## Installation

Install the bundle via Composer:

```bash
composer require zangra/geodis-bundle:^3.0
```

---

## Requirements

- PHP ^8.1
- Symfony Framework Bundle >= 6.4
- Doctrine Bundle
- Guzzle HTTP Client ^6.5.8 || ^7.8

---

## Configuration
Enable the bundle in config/bundles.php:
```php
return [
    // Other bundles...
    GeodisBundle\GeodisBundle::class => ['all' => true],
];
```

---

## Usage
Once configured, you can use the provided services to create and manage Geodis shipments.
Example service configuration:

```yaml
services:
  GeodisBundle\Manager\GeodisJsonApi:
    lazy: true
```
Then inject GeodisJsonApi into your services or controllers:
```php
use GeodisBundle\Manager\GeodisJsonApi;

class ShippingController
{
    public function __construct(private GeodisJsonApi $geodisApi) {}

    public function createLabel(): void
    {
        // Your logic to create a label
    }
}
```
