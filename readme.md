Project
========

Dev Dependencies:
-----------------

install: composer, elasticsearch, grunt

Project setup:
--------------

1. setup git hooks
```
bin/init
```
2. create database as `utf8_unicode_ci`
3. create `app/config/config.local.neon` from `config.local.example.neon`
4. run `bin/migration migrate` to create database schema
5. run `bin/console database populate` to insert testing data

In-app login credentials in `bin/fixtures.yml`

Aktualizace:
------------

1. získat změny z repo (bez merge!)
2. `composer install` pokud se změnily závislosti
3. `bin/migration migrate`
