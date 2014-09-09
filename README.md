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
</dl>

Requirements
------------

*Server:*

- php 5.5
- postgres
- redis
- elasticsearch 1.2.
- elasticsearch/elasticsearch-analysis-icu/2.2.0
- beanstalkd

<img src="http://www.jasoncavett.com/wp-content/uploads/2014/08/postgresql_logo.png" width="170">
<img width="30">
<img src="http://upload.wikimedia.org/wikipedia/en/thumb/6/6b/Redis_Logo.svg/467px-Redis_Logo.svg.png" width="150">
<img width="30">
<img src="http://blog.trifork.com/wp-content/uploads/2013/04/elasticsearch-logo.png" width="170">

*Dev / tests:*

- phantomjs
- casperjs
- nodejs
- grunt

Setup
-----

install git hooks:
```sh
sh bin/install-hooks
```

Content
-------
<img src="doc/khanova-skola-content.png" alt="Content Structure Schema" height="657">

Schema
------
As of `20140709125311-video-view`:
![screenshot 2014-07-11 11 29 11](https://cloud.githubusercontent.com/assets/192200/3550789/db88f4bc-08dd-11e4-9922-77e9b9526ced.png)

Info
----

Commit tags:

- `[test]`
- `[cs]` Coding standard, code smell removal, whitespace, etc. Should not affect build.
- `[dev]` Vagrant setup, dev stack edits, etc. Should not affect build.

skip codesniffer `pre-commit` hook
```sh
git commit --no-verify
```

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
