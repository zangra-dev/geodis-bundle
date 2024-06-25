# GeodisBundle

A Symfony bundle for Geodis Labels.

## Description

- GeodisBundle provides an easy way to manage and generate Geodis labels within a Symfony application.

## Installation

To install GeodisBundle, use Composer:

```bash
composer require zangra/geodisbundle

```

## Requirements

- PHP ^7.0
- Symfony Framework Bundle >=2.1
- Doctrine Bundle
- Guzzle HTTP Client ^6.2

## Configuration
- Add the bundle to your config/bundles.php file:

```php
return [
    // Other bundles...
    GeodisBundle\GeodisBundle::class => ['all' => true],
];
```

## Usage
- To use GeodisBundle, you need to set up the necessary configuration and services. For example:
```yaml
    # config/packages/geodis.yaml
    geodis:
    api_key: '%env(GEODIS_API_KEY)%'
```
