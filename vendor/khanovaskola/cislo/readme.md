Cislo: Integer to czech word translator
=======================================

[![Build Status](https://travis-ci.org/KhanovaSkola/cislo.svg?branch=master)](https://travis-ci.org/KhanovaSkola/cislo)
[![Downloads this Month](https://img.shields.io/packagist/dm/KhanovaSkola/cislo.svg?style=flat)](https://packagist.org/packages/KhanovaSkola/cislo)
[![Stable version](http://img.shields.io/packagist/v/KhanovaSkola/cislo.svg?style=flat)](https://packagist.org/packages/KhanovaSkola/cislo)
[![HHVM Status](http://img.shields.io/hhvm/KhanovaSkola/cislo.svg?style=flat)](http://hhvm.h4cc.de/package/KhanovaSkola/cislo)

Installation
------------

With composer:
```bash
composer require khanovaskola/cislo '@dev'
```

Usage
-----

```php
use KhanovaSkola\Cislo;

Cislo::parse('nula'); // 0
Cislo::parse('jedna'); // 1
Cislo::parse('jeden'); // 1
Cislo::parse('pětadvacet'); // 25
Cislo::parse('tisíc devět set dvacet pět'); // 1925
Cislo::parse('devatenáct set dvacet pět')); // 1925
Cislo::parse('jeden tisic devet set a dvacet pet'); // 1925
Cislo::parse('garble'); // KhanovaSkola\\InvalidArgumentException

Cislo::toWord(0); // nula
Cislo::toWord(1337); // tisíc tři sta třicet sedm
Cislo::toWord(3e8); // tři sta milionů
Cislo::toWord(1e9); // KhanovaSkola\\OutOfRangeException
```
