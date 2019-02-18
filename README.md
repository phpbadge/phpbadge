# phpbadge

[![Build Status](https://travis-ci.org/phpbadge/phpbadge.svg?branch=master)](https://travis-ci.org/phpbadge/phpbadge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phpbadge/phpbadge/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phpbadge/phpbadge/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/phpbadge/phpbadge/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/phpbadge/phpbadge/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/55394d401d2989cb7800001d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55394d401d2989cb7800001d)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/1c61e728-9b88-4e82-9d95-f91dc4cd6b93/mini.png)](https://insight.sensiolabs.com/projects/1c61e728-9b88-4e82-9d95-f91dc4cd6b93)

A PHP library to build badges as seen in README's of many open source libraries.

## Getting started

It's recommended to install this library via [Composer](https://getcomposer.org).

```bash
composer require phpbadge/phpbadge
```

The current master branch is considered stable. The badges on top of this document should confirm this.

## Requirements

As from version 2.0.0 this library needs a PHP version >= 7.1.

Older version of the library run on PHP 5.3, PHP 5.4, PHP 5.5, PHP 5.6, PHP 7 and HHVM.

## Example

```php
<?php

use PHP\Badge\Badge;
use PHP\Badge\Font\Font;
use PHP\Badge\Font\GdDimensionCalculator;
use PHP\Badge\Part;
use PHP\Badge\Renderer\SvgRenderer;

require 'vendor/autoload.php';

$badge = new Badge();
$badge->setBorderRadius(3);
$badge->addPart(new Part('build', '#555', '#fff', new Font(11, 'verdana', 'fonts/verdana.ttf')));
$badge->addPart(new Part('passing', '#4c1', '#fff', new Font(11, 'verdana', 'fonts/verdana.ttf')));

$renderer = new SvgRenderer(new GdDimensionCalculator());

echo $renderer->render($badge);
```
