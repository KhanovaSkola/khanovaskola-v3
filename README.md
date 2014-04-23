Khanova škola – verze 3
=======================

[![Build Status](https://travis-ci.org/KhanovaSkola/khanovaskola-v3.svg?branch=master)](https://travis-ci.org/KhanovaSkola/khanovaskola-v3)

Setup
-----

**These commands are to be run on local machichine:**

```sh
vagrant up
```

(If you are running guest additions 4.3.10 and getting an error, see http://stackoverflow.com/a/22723807/326257.)

install git hooks
```sh
sh bin/install-hooks
```

Info
----

Commit tags:

- `[cs]` Coding standard, code smell removal, whitespace, etc. Never affects build.
- `[dev]` Vagrant setup. Never affects build.

**These commands are to be run on local machichine:**

skip codesniffer `pre-commit` hook
```sh
git commit --no-verify
```

**These commands are to be run on vagrant (`vagrant ssh`):**

run unit tests:
```sh
php vendor/bin/tester -c /etc/php5/cgi/php.ini tests/unit/
```

run acceptance tests:
```sh
php vendor/bin/codecept run acceptance
```

run coding style (cs) tests:
```sh
php vendor/bin/phpcs -p --standard=tests/cs app
```

create new migration from template:
```sh
php bin/console db:create whatAmIChanging
```

run migrations:
```sh
php bin/console db:migrate
```

recreate elasticsearch indices from config file:
```sh
php bin/console db:es recreate
```

start/stop maintenance mode:
```sh
php bin/console maintenance:[stop|start]
```

build both styles (`grunt less`) and scripts (`grunt uglify`):
```sh
grunt
```

http server
http://vagrant.khanovaskola.cz/

adminer
http://vagrant.khanovaskola.cz/adminer

mail trap
https://mailtrap.io/inboxes/23883/messages

elasticsearch console
http://www.elastichq.org/app/index.php?url=http://vagrant.khanovaskola.cz:9200

beanstalkd console
http://vagrant.khanovaskola.cz/beanstalk/public/
