Khanova škola – verze 3
=======================

License
-------

MIT License, see [LICENSE.md](LICENSE.md)

Documentation
-------------

See [doc/readme.md](doc/readme.md).

Requirements
------------

All required dependencies are avaiable for both both Unix and Windows OSes.

*Server:*

- php >=5.6 (tested with 7.0 as well)
- postgres 9.3.5
- elasticsearch 1.2
- elasticsearch/elasticsearch-analysis-icu/2.2.0
- rabbitmq
- bc


*Dev / tests:*

- nodejs/npm
- bower
- gulp

Installation
------------
See [INSTALL.md](INSTALL.md)

Encrypted files
---------------

https://github.com/StackExchange/blackbox

Following files are GPG crypted: [blackbox files](keyrings/live/blackbox-files.txt)

Following developers can decrypt those files: [blackbox admins](keyrings/live/blackbox-admins.txt)

Data Model
----------
<img src="doc/khanova-skola-content.png" alt="Content Structure Schema" height="657">

<img src="doc/schema.png" alt="Database Schema">

Info
----

Commit tags:

- `[test]`
- `[cs]` Coding standard, code smell removal, whitespace, etc. Should not affect build.
- `[dev]` setup, dev stack edits, etc. Should not affect build.


invoke console:
```sh
php www/index.php
```

create new migration from template:
```sh
php www/index.php scaffolding:migration:sql note-what-are-you-changing
```

recreate elasticsearch mappings and repopulate
```sh
php www/index.php es:recreate && php www/index.php es:populate
```

run migrations:
```sh
php www/index.php migrations:migrate
```

build frontend:
```sh
gulp production
```

