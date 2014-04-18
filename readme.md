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

run unit tests:
```
php vendor/bin/tester tests/unit/
```

run acceptance tests:
```
php vendor/bin/codecept run acceptance
```

run coding style (cs) tests:
```
php vendor/bin/phpcs -p --standard=tests/cs app
```

http server
http://khanovaskola.l/

adminer
http://khanovaskola.l/adminer

mail catcher
http://khanovaskola.l:1080

beanstalkd console
http://khanovaskola.l/beanstalk/
