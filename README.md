Khanova škola – verze 3
=======================

[![Build Status](https://img.shields.io/travis/KhanovaSkola/khanovaskola-v3.svg?style=flat)](https://travis-ci.org/KhanovaSkola/khanovaskola-v3)
[![Dependency Status](https://www.versioneye.com/user/projects/53bab754609ff013b300020b/badge.svg?style=flat)](https://www.versioneye.com/user/projects/53bab754609ff013b300020b)

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
	<dt>mail trap</dt>
		<dd>https://mailtrap.io/inboxes/23883/messages</dd>
	<dt>elasticsearch console</dt>
		<dd>http://www.elastichq.org/app/index.php?url=http://vagrant.khanovaskola.cz:9200</dd>
	<dt>beanstalkd console</dt>
		<dd>http://vagrant.khanovaskola.cz/tools/beanstalk/public/</dd>
	<dt>opcache dashboard</dt>
		<dd>http://vagrant.khanovaskola.cz/tools/opcache/</dd>
	<dt>neo4j browser</dt>
		<dd>http://vagrant.khanovaskola.cz:7474/browser/</dd>
</dl>

Requirements
------------

*Server:*

- php 5.5
- postgres
- elasticsearch 1.2.
- elasticsearch/elasticsearch-analysis-icu/2.2.0
- neo4j
- redis
- beanstalkd

*Dev / tests:*

- phantomjs
- casperjs
- nodejs
- grunt

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

Schema
------
As of `20140707101042-paths-fix`:
![screenshot 2014-07-07 10 17 15](https://cloud.githubusercontent.com/assets/192200/3492743/3deeb808-05af-11e4-83dc-0d15e77e1314.png)

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
bin/console db:reset && bin/console neo:reset && bin/console db:migrate && bin/console es:recreate && bin/console db:fill
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
