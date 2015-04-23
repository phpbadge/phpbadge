# phpbadge

[![Build Status](https://travis-ci.org/phpbadge/phpbadge.svg?branch=master)](https://travis-ci.org/phpbadge/phpbadge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phpbadge/phpbadge/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phpbadge/phpbadge/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/phpbadge/phpbadge/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/phpbadge/phpbadge/?branch=master)

A PHP library to build badges as seem on many open source services.

## Getting started

It's recommended to install this library via [Composer](https://getcomposer.org).

```json
{
    "require": {
        "phpbadge/phpbadge": "dev-master"
    }
}
```

The current master branch is considered stable. The badges on top of this document should confirm this.

## Requirements

This library runs on PHP 5.3, PHP 5.4, PHP 5.5, PHP 5.6, PHP 7 and HHVM.

## Example

```php
<?php

use PHP\Badge\Badge;
use PHP\Badge\Font\Font;
use PHP\Badge\Font\GdWidthCalculator;
use PHP\Badge\Part;
use PHP\Badge\Renderer\SvgRenderer;

require 'vendor/autoload.php';

$badge = new Badge();
$badge->setBorderRadius(3);
$badge->addPart(new Part('build', '#555', '#fff', new Font(11, 'verdana', 'fonts/verdana.ttf')));
$badge->addPart(new Part('passing', '#4c1', '#fff', new Font(11, 'verdana', 'fonts/verdana.ttf')));

$renderer = new SvgRenderer(new GdWidthCalculator());

echo $renderer->render($badge);
```
