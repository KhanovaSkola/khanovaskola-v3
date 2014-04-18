Khanova škola – verze 3
=======================

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

http server
http://khanovaskola.l/

adminer
http://khanovaskola.l/adminer

mail catcher
http://khanovaskola.l:1080

beanstalkd console
http://khanovaskola.l/beanstalk/
