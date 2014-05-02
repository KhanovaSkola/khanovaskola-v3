Khanova škola – verze 3
=======================

[![Build Status](https://travis-ci.org/KhanovaSkola/khanovaskola-v3.svg?branch=master)](https://travis-ci.org/KhanovaSkola/khanovaskola-v3)

License
-------

MIT License, see [LICENSE.md](LICENSE.md)

Link directory
--------------

<dl>
	<dt>http server</dt>
		<dd>http://vagrant.khanovaskola.cz/</dd>
	<dt>adminer</dt>
		<dd>http://vagrant.khanovaskola.cz/tools/db/</dd>
	<dt>mail trap</td>
		<dd>https://mailtrap.io/inboxes/23883/messages</dd>
	<dt>elasticsearch console</td>
		<dd>http://www.elastichq.org/app/index.php?url=http://vagrant.khanovaskola.cz:9200</dd>
	<dt>beanstalkd console</td>
		<dd>http://vagrant.khanovaskola.cz/tools/beanstalk/public/</dd>
	<dt>opcache dashboard</td>
		<dd>http://vagrant.khanovaskola.cz/tools/opcache/</dd>
</dl>

Setup
-----

**These commands are to be run on local machichine:**

```sh
vagrant up
```

(If you are running guest additions 4.3.10 and getting an error, see http://stackoverflow.com/a/22723807/326257.)

install git hooks:
```sh
sh bin/install-hooks
```

Info
----

Commit tags:

- `[test]`
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
sh tests/cs/run.sh
```

create new migration from template:
```sh
php bin/console db:create whatAmIChanging
```

drop all data, recreate schemas and indices:
```sh
bin/console db:reset && bin/console db:migrate && bin/console es:recreate && bin/console db:fill
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
