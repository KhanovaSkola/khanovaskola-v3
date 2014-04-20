Khanova škola – verze 3
=======================

[![Build Status](https://travis-ci.org/KhanovaSkola/khanovaskola-v3.svg?branch=master)](https://travis-ci.org/KhanovaSkola/khanovaskola-v3)

Setup
-----

```
vagrant up
```

while vagrant installs, add the following line to your `/etc/hosts`
```
192.168.56.101 khanovaskola.l
```

Info
----

**These commands are to be run on vagrant (`vagrant ssh`).**

run unit tests:
```
php -c /etc/php5/cli/php.ini vendor/bin/tester tests/unit/
```

run acceptance tests:
```
php vendor/bin/codecept run acceptance
```

run coding style (cs) tests:
```
php vendor/bin/phpcs -p --standard=tests/cs app
```

create new migration from template:
```
php bin/console db:create whatAmIChanging
```

run migrations:
```
php bin/console db:migrate
```

start/stop maintenance mode:
```
php bin/console maintenance:[stop|start]
```

build both styles (`grunt less`) and scripts (`grunt uglify`):
```
grunt
```

http server
http://khanovaskola.l/

adminer
http://khanovaskola.l/adminer

mail catcher
http://khanovaskola.l:1080

beanstalkd console
http://khanovaskola.l/beanstalk/public/
